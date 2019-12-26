<template>
    <div class="container">
        <div class="panel panel-default" style="background-color: #e3f2fd;">
            <div class="panel-head">
                <label for="Offer">Create a new offer</label>
                <h2>Create a new offer</h2>
            </div>
            <div class="panel-body">
                <div class="form-group col-md-3">
                    <label for="clientname">Project Name</label>
                    <input
                        type="text"
                        placeholder="Enter Project Name"
                        class="form-control"
                    />
                </div>

                <div class="form-group col-md-5">
                    <label for="clientname">Project description test</label>
                    <input
                        type="text"
                        placeholder="Enter Project Description"
                        class="form-control"
                    />
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                <button class="float-right">+</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>Disicription</td>
                                <td>Estimate</td>
                                <td>Save as template</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="number"></td>
                                <td><input type="checkbox"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
