<template>
  <div class="container">
    <div class="col-md-8 panel panel-default" style="background-color: #e3f2fd;">
      <div class="row">
        <div class="panel-body">
          <div class="form-group">
            <label for="clientname">Client</label>
            <select class="form-control" name="cvrNumber" id="cvrNumber">
              <option disable>Select CVR Number</option>
              <option v-for="(client, k) in clients" :key="k">{{client.cvr}}</option>
            </select>
          </div>
          <div class="form-group">
            <label for="roductname">Project Name</label>
            <input
              type="text"
              placeholder="Enter Project Name"
              class="form-control"
              v-model="projectName"
            />
          </div>
          <div class="form-group">
            <label for="productdesc">Project description</label>
            <textarea
              style="width: 100%; resize: none;"
              name="test"
              id="projectDescription"
              rows="3"
              placeholder="Enter Project Description"
              v-model="projectDescription"
            ></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 panel panel-default" style="background-color: #e3f2fd;">
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
                <label id="TotalHours" name="TotalHours" style="margin-bottom:25px;">{{totalTime}}</label>
              </div>
            </div>
            <div class="row">
              <div class="col-3">Price (DKK):</div>
              <div class="col-3">
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
      <select class="form-control col-md-6" v-model="cvr">
        <option value disabled selected>Pick a Template Task</option>
      </select>
      <table class="table">
        <thead>
          <tr>
            <th class="col-sm-4">Title</th>
            <th class="col-sm-6">Description</th>
            <th class="col-sm-1">Estimate</th>
            <th class="col-sm-1">Save as Template</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(task, k) in tasks" :key="k">
            <td>
              <input class="form-control" type="text" v-model="task.title" />
            </td>
            <td>
              <input class="form-control" type="text" v-model="task.description" />
            </td>
            <td>
              <input
                class="form-control text-right"
                type="number"
                min="0"
                step="1"
                v-model="task.estimate"
                @change="calculateTotal(task)"
              />
            </td>
            <td>
              <input class="form-control" type="checkbox" v-model="task.save" />
            </td>
            <td scope="row" class="trashIconContainer">
              <i class="fa fa-trash" @click="deleteRow(k, task)"></i>
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <button type="button" class="btn btn-primary" style="margin-left: 10px" @click="addNewRow">
          <i class="fa fa-plus"></i> Add
        </button>
        <button type="submit" class="btn btn-primary" style="margin-right: 10px; float: right">
          <i class="fa fa-save"></i> Save test
        </button>
        <!-- <button type="button" class="btn btn-primary" style="margin-left: 10px" @click="getClient">
          <i class="fa fa-plus"></i> test
        </button>-->
      </div>
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
      tasks: [
        {
          title: "",
          description: "",
          estimate: 0,
          save: false
        }
      ],
      templates: [
        {
          title: "",
          description: "",
          estimate: 0
        }
      ],
      clients: [
        {
          cvr: "",
          default_price: 970
        }
      ]
    };
  },
  methods: {
    getClient() {
      this.clients.cvr = 123456789;
      this.clients.default_price = 970;
    },
    getTemplate() {},

    calculateTotal() {
      var devtime, managetime, totaltime, total;
      devtime = this.tasks.reduce(function(sum, task) {
        var estimate = parseFloat(task.estimate);
        if (!isNaN(estimate)) {
          return sum + estimate;
        }
      }, 0);

      var price = this.clients.default_price;
      managetime = (devtime / 100) * 20;
      totaltime = (devtime + managetime).toFixed(0);
      total = totaltime * price;

      if (!isNaN(total)) {
        this.devTime = devtime;
        this.manageTime = managetime.toFixed(0);
        this.totalTime = totaltime;
        this.price = total;
      } else {
        this.devTime = "error";
        this.manageTime = "error";
        this.totalTime = "error";
        this.price = "error";
      }
    },

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
        estimate: 0,
        save: false
      });
    }
  }
};
</script>

<style></style>
