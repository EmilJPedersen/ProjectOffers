<template>
  <div class="container">
    <hr />
    <div class="col-lg-4">
      <label for="cvr">CVR</label>
      <input
        id="cvr"
        name="cvr"
        type="text"
        placeholder="Enter Client CVR"
        class="form-control"
        :value="cvr"
      />
    </div>
    <div class="col-lg-4">
      <label for="clientname">Client Name</label>
      <input
        id="clientname"
        name="name"
        type="text"
        placeholder="Enter Client Name"
        class="form-control"
        :value="name"
      />
    </div>
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
        />
      </div>
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
      name: "",
      cvr: "",
      default_price: "",
      results: []
    };
  },
  methods: {
    selectResult(result) {
      this.results = [];

      this.name = result.name
      this.cvr = result.cvrNummer;
      this.price = result.default_price;
    }
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
  box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);
  z-index: 99;
}
.searchResults ul li {
  cursor: pointer;
}
.searchResults li span {
  font-size: 0.8rem;
}
</style>
