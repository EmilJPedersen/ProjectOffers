<template>
  <div class="container">
    <div class="col-md-8 panel panel-default" style="background-color: #e3f2fd;">
      <div class="row">
        <div class="panel-body">
          <div class="form-group">
            <label for="clientname">Client</label>
            <select placeholder="Pick a Client" class="form-control">
              <option value disabled selected>Pick a Client</option>
            </select>
          </div>
          <div class="form-group">
            <label for="roductname">Project Name</label>
            <input type="text" placeholder="Enter Project Name" class="form-control" />
          </div>
          <div class="form-group">
            <label for="productdesc">Project description test</label>
            <textarea
              style="width: 100%; resize: none;"
              name="test"
              id="projectDescription"
              rows="3"
              placeholder="Enter Project Description"
            ></textarea>
          </div>
        </div>
      </div>
    </div>

    <div
      class="col-md-4 panel panel-default"
      style="padding-bottom:93px; background-color: #e3f2fd;"
    >
      <!--21px-->
      <center>
        <h5 class="font-weight-bold">Total</h5>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <div class="row">
              <div class="col-3">
                Development Hours:
                <br />
              </div>
              <div class="col-3">
                <input
                  type="text"
                  id="TotalDeveloperHours"
                  name="TotalDeveloperHours"
                  readonly="readonly"
                  class="calculation_result"
                />
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                Project Management:
                <br />
              </div>
              <div class="col-3">
                <input
                  type="text"
                  id="TotalPMHours"
                  name="TotalPMHours"
                  readonly="readonly"
                  class="calculation_result"
                  value
                />
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                Total Project Hours:
                <br />
              </div>
              <div class="col-3">
                <input
                  type="text"
                  id="TotalHours"
                  name="TotalHours"
                  readonly="readonly"
                  class="calculation_result"
                  value
                />
              </div>
            </div>
            <div class="row">
              <div class="col-3">Price (DKK):</div>
              <div class="col-3">
                <input
                  type="text"
                  id="TotalPrice"
                  name="TotalPriceExclVat"
                  readonly="readonly"
                  class="calculation_result"
                />
              </div>
            </div>
          </div>
        </div>
      </center>
    </div>

    <div class="panel panel-default" style="padding-bottom:21px;">
      <tr v-for="item in tableRows">
        <th scope="row">{{ item.mail }}</th>
        <td>{{ item.date }}</td>
        <td>{{ item.adress }}</td>
        <td>{{ item.company }}</td>
        <td>{{ item.fliers }}</td>
      </tr>
      <!-- <a
        href="#"
        style="float:right;font-size:10px;"
        data-toggle="modal"
        data-target="#EstimateModal"
      >Pick a Template</a>
      <h6 class="border-bottom border-gray pb-2 mb-0">Estimate</h6>
      <div class="panel-body media text-muted pt-3">
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <div class="content w-100">
              <div class="row">
                <div class="col-12">
                  <table id="tblEstimate" style="width:100%" class="excel-table">
                    <tr>
                      <th class="col-sm-4">Title</th>
                      <th class="col-sm-5">Discription</th>
                      <th class="col-sm-2">Estimate</th>
                      <th class="col-sm-1">Save</th>
                      
                    </tr>
                  </table>
                  
                  <a
                    href="#"
                    style="float:right;margin-right:25px;"
                    onfocus="addItem();"
                  >
                    <i class="fa fa-plus"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-3 p-3 bg-red rounded shadow-sm" style="display:none;">
        <a href="#" style="float:right;font-size:10px;">Skjult information</a>
        <h6 class="border-bottom border-gray pb-2 mb-0">Skjult information</h6>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <div class="content w-100">
                <div>
                  <div class="row">
                    <div class="col-sm-4">
                      <textarea
                        name="title"
                        id="title"
                        style="width:100%;resize: none;padding:5px;"
                        value="test"
                      ></textarea>
                    </div>
                    <div class="col-sm-5">
                      <textarea
                        name="description"
                        id="description"
                        style="width:100%;resize: none;padding:5px;"
                        value="test"
                      ></textarea>
                    </div>
                    <div class="col-sm-2">
                      <textarea
                        name="estimatehours"
                        id="estimatehours"
                        style="width:100%;resize: none;text-align:right;padding:5px;"
                        value="12"
                      ></textarea>
                    </div>
                    <div class="col-sm-1">
                      <input name="save" id="save" style="width:100%;resize: none;padding:5px;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
import { debounce } from "lodash";
export default {
  data() {
    return {
      projectName: "",
      projectDescription: "",
      title: "",
      description: "",
      estimatehours: "",
      save: "",
      devTime: "",
      manageTime: "",
      totalTime: "",
      price: "",
      results: [],
      tableRows: [],
      counter: 1,
      estrownum: 1
    };
  },
  methods: {
    selectResult(result) {
      this.results = [];

      this.projectName = result.projectName;
      this.projectDescription = result.projectDescription;
      this.title = result.title;
      this.description = result.description;
      this.estimatehours = result.estimatehours;
      this.save = result.save;
      this.devTime = result.devTime;
      this.manageTime = result.manageTime;
      this.totalTime = result.totalTime;
      this.price = result.price;
    },
    // addTableRow: function() {
    //   this.counter++;
    //   this.tableRows.push("Table Row " + this.counter);
    // },
    addItem() {
      var my_object = {
        title: this.title,
        description: this.description,
        estimatehours: this.estimatehours,
        save: this.save
      };
      this.tableRows.push(my_object);

      this.title = "";
      this.description = "";
      this.estimatehours = "";
      this.save = "";
    }
    // addEstimateRow() {
    //   estrownum++;

    //   $("#tblEstimate > tbody:last-child").append(
    //     '<tr><td><input placeholder="Beskriv ydelse her (max 35 tegn)" id="estlinetext_manuel_' +
    //       estrownum +
    //       '" type="text" value="" class="estimate_text" onchange="calculate();" maxlength="35">'+
    //       '</td><td><input id="estlinevalue_manuel" type="text" value="0" class="estimate_value" onchange="calculate();" style="text-align:right;"></td></tr>'
    //   );
    //   $("#estlinetext_manuel_" + estrownum).focus();
    // }
  }
};
</script>

<style></style>
