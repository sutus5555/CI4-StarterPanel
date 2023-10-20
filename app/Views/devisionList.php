<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> Devision List <a href="<?= base_url('Devision/form'); ?>" class="btn btn-primary btn-sm float-end">Create New Devision</a></h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('xxxx'); ?>" method="post">
            <div class="row ">
                <div class="form-group col-md-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" title="Enter the Department name it will show on report" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" title="Enter the Description it will show on report" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="remark">Remark</label>
                    <input type="text" class="form-control" name="remark" id="remark" title="Enter the Remark it will show on report" required>
                </div>
            </div>

            <div class="row">
                <div class="cd-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection(); ?>