<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0"> Input Budget Form </h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('xxxx'); ?>" method="post">
            <div class="row ">
                <div class="form-group col-md-2">
                    <label for="name">Budget Name</label>
                    <input type="text" class="form-control" name="name" id="name" title="Enter the budget name it will show on report as name" required >
                </div>
                <div class="form-group col-md-2">
                    <label for="type">ฺBudgetType</label>
                    <select class="form-select" name="type" id="type" title="Enter the budget name it will show on report as name" required>
                        <option value="">-- Select Type --</option>
                        <option value="1" selected>Normal</option>
                        <option value="2">CE</option>
                        <option value="3">Extra1</option>
                        <option value="4">Extra2</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">ฺBudgetGroup</label>
                    <select class="form-select" name="ฺBudgetType" id="ฺBudgetType" required>
                        <option value="">-- Select Group --</option>
                        <option value="1">Office Equipment</option>
                        <option value="2">W'house Equipment </option>
                        <option value="3">Re-packaging Dept.</option>
                        <option value="4">Hardware & Software</option>
                        <option value="4">Motor Vehicle</option>
                        <option value="4">NON SALARIES RELATED EXPENSES</option>
                        <option value="4">AUDIT FEES</option>
                        <option value="4">HCLEANING SERVICE</option>
                        <option value="4">COMPENSATION</option>
                        <option value="4">COMMISSION PAID - THIRTY PARTY</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">ฺBudgetRepeat</label>
                    <select class="form-select" name="ฺBudgetRepeat" id="ฺBudgetRepeat" required>
                        <option value="">-- Select --</option>
                        <option value="0" selected>OneTime</option>
                        <option value="1">1Year</option>
                        <option value="2">2Years</option>
                        <option value="3">3Years</option>
                        <option value="4">4Years</option>
                        <option value="5">5Years</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputLast">YearEND</label>
                    <input type="date" class="form-control" name="inputLast" id="inputLast" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputName">Devision/DEPT</label>
                    <select class="form-select" name="Devision" id="inputName" required>
                        <option value="">-- Select Devision --</option>
                        <option value="1">IT</option>
                        <option value="2">HR</option>
                        <option value="3">Store</option>
                        <option value="4">Sales</option>
                        <option value="5">CS</option>
                        <option value="6">Purchase</option>
                        <option value="7">Management</option>
                        <option value="8">Accounting</option>
                        <option value="9">Maintenance</option>
                        <option value="10">Safety</option>
                        <option value="11">Supply-chain</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">User</label>
                    <select class="form-select" name="User" id="User" required>
                        <option value="">-- Select User --</option>
                        <option value="1">Thanomsak_s</option>
                        <option value="2">Sutus_p</option>

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">Price/Pieces</label>
                    <input type="number" class="form-control" name="inputName" id="inputName" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">Budgeted Cost (THB)</label>
                    <input type="text" class="form-control" name="inputName" id="inputName" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputName">PaymentMode</label>
                    <select class="form-select" name="ฺBudgetType" id="ฺBudgetType" required>
                        <option value="">-- Select Type --</option>
                        <option value="1" selected>CASH</option>
                        <option value="2">Credit30Day</option>
                        <option value="3">Credit60Day</option>
                        <option value="4">Extra1</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputLast">Proposed</label>
                    <input type="date" class="form-control" name="inputLast" id="inputLast" required>
                </div>


            </div>
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="inputId">ฺBudget Detail</label>
                    <input type="text" class="form-control" name="inputId" id="inputId" required>
                </div>
                <div class="form-group col-md-10">
                    <label for="inputRemark">Remark</label>
                    <input type="text" class="form-control" name="inputRemark" id="inputRemark" required>
                </div>
            </div>
            <div class="row">
                <div class="cd-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Save Data</button>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> Input_budget List <a href="<?= base_url('InputBudget/form'); ?>" class="btn btn-primary btn-sm float-end">Create New Input_budget</a></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>