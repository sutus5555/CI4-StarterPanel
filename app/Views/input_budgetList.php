<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> Input Budget Form </h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('xxxx'); ?>" method="post">
            <div class="form-group">
                <label for="inputId">ฺBudget Detail</label>
                <input type="text" class="form-control" name="inputId" id="inputId" required>
            </div>
            <div class="form-group">
                <label for="inputName">Division/DEPT</label>
                <input type="text" class="form-control" name="inputName" id="inputName" required>
            </div>
            <div class="form-group">
                <label for="inputLast">Proposed</label>
                <input type="date" class="form-control" name="inputLast" id="inputLast" required>
            </div>
            <div class="form-group">
                <label for="inputRemark"> Busget Cost {BHT} </label>
                <input type="text" class="form-control" name="inputRemark" id="inputRemark" required>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary" type="submit">Save Data</button>
            </div>
        </form>

    </div>
</div>
<div class="card">

    <div class="card-header">
        <h5 class="card-title mb-0"> Input Budget List <a href="<?= base_url('Input_budget/form'); ?>" class="btn btn-primary btn-sm float-end">Create New Input Budget</a></h5>
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