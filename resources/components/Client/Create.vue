<template>
  <div>
    <div class="search">
      <input
        name="search"
        type="text"
        placeholder="Search on Client Name or VAT ID"
        class="form-control"
        @keyup="debounceSearch"
        v-model="search"
      >

      <div v-if="results.length > 0" class="searchResults">
        <ul class="list-group">
          <li @click="selectResult(result)" v-for="result in results" :key="result.vat" class="list-group-item list-group-item-action">
            {{result.virksomhedMetadata.nyesteNavn ? result.virksomhedMetadata.nyesteNavn.navn : "!!!! NAVN MANGLER"}}
            <br>
            <span>{{result.virksomhedMetadata.nyesteBeliggenhedsadresse.vejnavn}}
              {{result.virksomhedMetadata.nyesteBeliggenhedsadresse.husnummerFra}}
              {{result.virksomhedMetadata.nyesteBeliggenhedsadresse.postnummer}}
              {{result.virksomhedMetadata.nyesteBeliggenhedsadresse.postdistrikt}}</span>
            <br>
            <span>CVR: {{result.cvrNummer}}</span>
          </li>
        </ul>
      </div>

      <div v-if="isSearching" class="searchIndicator">
        <div class="be-spinner">
          <svg width="35px" height="35px" viewBox="0 0 66 66">
            <circle
              fill="none"
              stroke-width="4"
              stroke-linecap="round"
              cx="33"
              cy="33"
              r="30"
              class="circle"
            ></circle>
          </svg>
        </div>
      </div>
    </div>

    <hr>
    <div class="form-group pt-2">
      <label for="clientname">CVR</label>
      <input
        id="vat"
        name="vat"
        type="text"
        placeholder="Enter Client CVR"
        class="form-control"
        :value="vat"
      >
    </div>
    <div class="form-group pt-2">
      <label for="clientname">Client Name</label>
      <input
        id="clientname"
        name="name"
        type="text"
        placeholder="Enter Client Name"
        class="form-control"
        :value="name"
      >
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input
        id="address"
        name="address"
        type="text"
        placeholder="Enter Client Address"
        class="form-control"
        :value="address"
      >
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="postcode">Postcode</label>
          <input
            id="postcode"
            name="postcode"
            type="text"
            placeholder="Enter Client Postcode"
            class="form-control"
            :value="zip"
          >
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="suburb">City</label>
          <input
            id="city"
            name="city"
            type="text"
            placeholder="Enter Client City"
            class="form-control"
            :value="city"
          >
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="price">Default Price</label>
          <input
            id="price"
            name="price"
            type="number"
            placeholder="Enter Default Price"
            class="form-control"
            value="970"
          >
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for="economicid">Economic id</label>
          <input
            id="economicid"
            name="economicid"
            type="number"
            placeholder="Enter Economic ID"
            class="form-control"
            :value="economic"
          >
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for="invoicemethod">Invoice Method</label>
			    <select
          id="invoicemethod"
          name="invoicemethod"
          class="form-control"
          value="0"
          >
				    <option value="0">Collected Invoice</option>
				    <option value="1">Invoice Per Project</option>
			    </select>
        </div>
      </div>
    </div>
    <div class="form-group pt-4">
      <label class="custom-control custom-checkbox custom-control-inline">
        <input id="enabled" name="enabled" type="checkbox" checked class="custom-control-input">
        <span class="custom-control-label custom-control-color">Enabled</span>
      </label>
    </div>
    <div class="row pt-3">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-space btn-primary">Create Client</button>
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from "lodash";
export default {
  data() {
    return {
      search: "",
      name: "",
      address: "",
      zip: "",
      city: "",
      economic: "",
      vat: "",
      results: [],
      isSearching: false,
    };
  },
  created() {
    this.debounceSearch = debounce(this.companySearch, 500);
  },
  methods: {
    companySearch() {
      this.results = [];
      if (this.search.length >= 3) {
        this.isSearching = true;
        axios.get('/api/cvr/' + this.search)
          .then(({data}) => {
            const mapped = data.companies.map((c) => c._source.Vrvirksomhed);
            this.results = mapped;
            this.isSearching = false;
          })
          .catch(response => {
            console.error(response);
          });
      }
    },
    selectResult(result) {
      this.results = [];

      const address = result.virksomhedMetadata.nyesteBeliggenhedsadresse;

      const husnummer = address.husnummerFra + (address.husnummerTil ? "-" + address.husnummerTil : "");
      const bogstav = address.bogstavFra ? address.bogstavFra + (address.bogstavTil ? "-" + address.bogstavTil : "") : "";
      const streetDetails = husnummer + bogstav + " " + (address.etage ? address.etage : "") + " " + (address.sidedoer ? address.sidedoer : "");

      this.name = result.virksomhedMetadata.nyesteNavn ? result.virksomhedMetadata.nyesteNavn.navn : "NAVN MANGLER";
      this.vat = result.cvrNummer;
      this.economic = result.cvrNummer;
      this.address = address.vejnavn + " " + streetDetails;
      this.zip = address.postnummer;
      this.city = address.postdistrikt;
    },
  }
};
</script>

<style scoped>
.search {
  position: relative;
}
.searchIndicator {
  position: absolute;
  top: 5px;
  right: 20px;
}
.searchResults {
  position: absolute;
  left: 0;
  top: 40px;
  min-width: 250px;
  box-shadow: 0px 3px 15px rgba(0,0,0,0.2);
  z-index: 99;
}
.searchResults ul li{
  cursor: pointer;
}
.searchResults li span {
  font-size: 0.8rem;
}
</style>
