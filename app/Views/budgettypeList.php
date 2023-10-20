<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> BudgetType List</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('BudgetType/createtype'); ?>" method="post">
            <div class="row ">
                <div class="form-group col-md-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" title="Enter the BudgetType name it will show on report" required>
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
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> BudgetType List </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- ... other content ... -->
            <table id="groupTable" class="display">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>BudgetType Name</th>
                        <th>Description</th>
                        <th>Remark</th>
                        <th>Creater</th>
                        <th>create_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowNumber = 1; // Initialize row number
                    foreach ($type as $type) : ?>
                        <tr>
                            <td><?= $rowNumber; ?></td>
                            <td><?= $type['name']; ?></td>
                            <td><?= $type['description']; ?></td>
                            <td><?= $type['remark']; ?></td>
                            <td><?= $type['creater']; ?></td>
                            <td><?= $type['create_at']; ?></td>
                            <td>
                                <!-- Use data attributes to store category data for the modal -->
                                <button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $type['id']; ?>" data-name="<?= $type['name']; ?>" data-description="<?= $type['description']; ?>" data-remark="<?= $type['remark']; ?>">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $type['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php
                        $rowNumber++; // Increment row number
                    endforeach;
                    ?>
                </tbody>
            </table>

            <!-- ... other content ... -->

        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit BudgetType </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('BudgetType/updateType'); ?>" method="post" id="editForm">
                    <input type="hidden" name="typeID" id="typeID">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editName" class="form-label">BudgettypeID Name</label>
                            <input type="text" class="form-control" name="editName" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">BudgettypeID Description</label>
                            <input type="text" class="form-control" name="editDescription" id="editDescription" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRemark" class="form-label">BudgettypeID Remark</label>
                            <input type="text" class="form-control" name="editRemark" id="editRemark" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update BudgetType</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get data from edit button attributes
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const remark = button.getAttribute('data-remark');
            const id = button.getAttribute('data-id');

            // Populate the modal form fields
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editRemark').value = remark;
            document.getElementById('typeID').value = id;
        });
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, perform the delete action
                window.location.href = '<?= base_url('BudgetType/delete/'); ?>' + id;
            } else {
                // User canceled the operation
                // You can add additional logic here if needed
            }
        });
    }
</script>

<?= $this->endSection(); ?>