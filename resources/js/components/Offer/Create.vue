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

    <div class="col-md-4 panel panel-default" style="background-color: #e3f2fd;">
      <!--21px-->
      <center>
        <h5 class="font-weight-bold">Total</h5>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <div class="row">
              <div class="col-2">
                Development Hours:
                <br />
              </div>
              <div class="col-2">
                <!-- <input
                  type="text"
                  id="TotalDeveloperHours"
                  name="TotalDeveloperHours"
                  readonly="readonly"
                  class="calculation_result"
                  style="margin-bottom:22px;"
                />-->
                <label
                  id="TotalDeveloperHours"
                  name="TotalDeveloperHours"
                  style="margin-bottom:25px;"
                >{{devTime}}</label>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                Project Management:
                <br />
              </div>
              <div class="col-3">
                <!-- <input
                  type="text"
                  id="TotalPMHours"
                  name="TotalPMHours"
                  readonly="readonly"
                  class="calculation_result"
                  style="margin-bottom:22px;"
                  value
                />-->
                <label
                  id="TotalPMHours"
                  name="TotalPMHours"
                  style="margin-bottom:25px;"
                >{{manageTime}}</label>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                Total Project Hours:
                <br />
              </div>
              <div class="col-3">
                <!-- <input
                  type="text"
                  id="TotalHours"
                  name="TotalHours"
                  readonly="readonly"
                  class="calculation_result"
                  style="margin-bottom:22px;"
                  value
                />-->
                <label id="TotalHours" name="TotalHours" style="margin-bottom:25px;">{{totalTime}}</label>
              </div>
            </div>
            <div class="row">
              <div class="col-3">Price (DKK):</div>
              <div class="col-3">
                <!-- <input
                  type="text"
                  id="TotalPrice"
                  name="TotalPriceExclVat"
                  readonly="readonly"
                  class="calculation_result"
                  style="margin-bottom:25px;"
                />-->
                <label
                  id="TotalPriceExclVat"
                  name="TotalPriceExclVat"
                  style="margin-bottom:40px;"
                >{{price}}</label>
              </div>
            </div>
          </div>
        </div>
      </center>
    </div>

    <div class="panel panel-default" style="padding-bottom:21px;">
      <!-- <table id="tblEstimate" style="width:100%" class="excel-table">
        <thead>
          <tr>
            <th class="col-sm-4">Title</th>
            <th class="col-sm-5">Discription</th>
            <th class="col-sm-1">Estimate</th>
            <th class="col-sm-1">Save</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(task, k) in tasks" :key="k">
            <td>
              <input class="form-control" type="text" v-model="tasks.title" />
            </td>
            <td>
              <input class="form-control" type="text" v-model="tasks.description" />
            </td>
            <td>
              <input
                class="form-control text-right"
                type="number"
                min="0"
                step="1"
                v-model="tasks.estimate"
                @change="calculateLineTotal(tasks)"
              />
            </td>
            <td>
              <input class="form-control" type="checkbox" v-model="tasks.save" />
            </td>
            <td scope="row" class="trashIconContainer">
              <i class="fa fa-trash col-sm-1" @click="deleteRow(k, tasks)"></i>
            </td>
          </tr>
        </tbody>
      </table>-->
      <table class="table">
        <thead>
          <tr>
            <th class="col-sm-4">Title</th>
            <th class="col-sm-5">Discription</th>
            <th class="col-sm-1">Estimate</th>
            <th class="col-sm-1">Save</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(task, k) in tasks" :key="k">
            <td>
              <input class="form-control" type="text" v-model="tasks.title" />
            </td>
            <td>
              <input class="form-control" type="text" v-model="tasks.description" />
            </td>
            <td>
              <input
                class="form-control text-right"
                type="number"
                min="0"
                step="1"
                v-model="tasks.estimate"
              />
            </td>
            <td>
              <input
                class="form-control"
                type="checkbox"
              />
            </td>
            <td scope="row" class="trashIconContainer">
              <i class="fa fa-trash" @click="deleteRow(k, tasks)"></i>
            </td>
          </tr>
          <!-- <tr v-show="invoice_products.length === 0">
            <td colspan="6">
              <p class="text-center alert-danger p-2">No products added/available.</p>
            </td>
          </tr>-->
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="text-right">DevTime</td>
            <td class="text-right">{{devTime}}</td>
          </tr>
          <tr>
            <td colspan="5" class="text-right">Default Price</td>
            <td class="text-right">{{default_price}}</td>
          </tr>
          <tr>
            <td colspan="5" class="text-right">Price</td>
            <td class="text-right">{{price}}</td>
          </tr>
        </tfoot>
      </table>
      <button type="button" class="btn btn-primary" @click="addNewRow">
        <i class="fa fa-plus" style="padding-left:10px;"></i>
        Add
      </button>
      <select class="form-control col-sm-1">
        <option value disabled selected>Pick a Template Task</option>
      </select>
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

      devTime: 0,
      manageTime: 0,
      totalTime: 0,
      price: 0,
      default_price: 970,
      results: [],
      tasks: [
        {
          title: "",
          description: "",
          estimate: 0,
          save: false
          //   line_total: 0
        }
      ],

      invoice_subtotal: 0,
      invoice_total: 0,
      invoice_tax: 5,
      invoice_products: [
        {
          product_no: "",
          product_name: "",
          product_price: "",
          product_qty: ""
          //   line_total: 0
        }
      ]
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
    saveInvoice() {
      console.log(JSON.stringify(this.tasks));
    },
    calculateTotal() {
      var devtime, total;
      //   devtime = this.tasks.reduce(function(sum, product) {
      //     var lineTotal = parseFloat(product.line_total);
      //     if (!isNaN(lineTotal)) {
      //       return sum + lineTotal;
      //     }
      //   }, 0);

      this.devTime = devtime.toFixed(2);

      total = devtime * this.default_price;
      total = parseFloat(total);
      if (!isNaN(total)) {
        this.price = total.toFixed(2);
      } else {
        this.price = "0";
      }
    },
    // calculateLineTotal(task) {
    //   var total = parseFloat(task.estimate);
    //   if (!isNaN(total)) {
    //     tasks.line_total = total.toFixed(2);
    //   }
    //   this.calculateTotal();
    // },
    deleteRow(index, task) {
      var idx = this.tasks.indexOf(task);
      console.log(idx, index);
      if (idx > -1) {
        this.tasks.splice(idx, 1);
      }
      this.calculateTotal();
    },
    addNewRow() {
      this.tasks.push({
        title: "",
        description: "",
        estimate: "",
        save: false
      });
    }
    // saveInvoice() {
    //   console.log(JSON.stringify(this.invoice_products));
    // },
    // calculateTotal() {
    //   var subtotal, total;
    //   subtotal = this.invoice_products.reduce(function(sum, product) {
    //     var lineTotal = parseFloat(product.line_total);
    //     if (!isNaN(lineTotal)) {
    //       return sum + lineTotal;
    //     }
    //   }, 0);

    //   this.invoice_subtotal = subtotal.toFixed(2);

    //   total = subtotal * (this.invoice_tax / 100) + subtotal;
    //   total = parseFloat(total);
    //   if (!isNaN(total)) {
    //     this.invoice_total = total.toFixed(2);
    //   } else {
    //     this.invoice_total = "0.00";
    //   }
    // },
    // calculateLineTotal(invoice_product) {
    //   var total =
    //     parseFloat(invoice_product.product_price) *
    //     parseFloat(invoice_product.product_qty);
    //   if (!isNaN(total)) {
    //     invoice_product.line_total = total.toFixed(2);
    //   }
    //   this.calculateTotal();
    // },
    // deleteRow(index, invoice_product) {
    //   var idx = this.invoice_products.indexOf(invoice_product);
    //   console.log(idx, index);
    //   if (idx > -1) {
    //     this.invoice_products.splice(idx, 1);
    //   }
    //   this.calculateTotal();
    // },
    // addNewRow() {
    //   this.invoice_products.push({
    //     product_no: "",
    //     product_name: "",
    //     product_price: "",
    //     product_qty: "",
    //     line_total: 0
    //   });
    // }
  }
};
</script>

<style></style>
