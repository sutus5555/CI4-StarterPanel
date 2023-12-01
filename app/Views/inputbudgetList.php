<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0"> Input Budget Form </h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('InputBudget/createBudget'); ?>" method="post">
            <div class="row ">
                <div class="card-header">
                    <h5 class="card-title mb-0">Budget Setup</h5>
                </div>
                <div class="form-group col-md-2">
                    <label for="name">Budget Name</label>
                    <input type="text" class="form-control" name="name" id="name" title="Enter the budget name it will show on report as name" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="type">ฺBudgetType</label>
                    <select class="form-select" name="type" id="type" title="Enter the budget name it will show on report as name" required>
                        <option value="">--Select a type--</option>
                        <?php foreach ($type as $type) : ?>
                            <?php
                            $selected = ($type['id'] == session('input_data.category')) ? 'selected' : '';
                            ?>
                            <option value="<?= $type['id'] ?>" <?= $selected ?>><?= $type['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="group">ฺBudgetGroup</label>
                    <select class="form-select" name="group" id="group" required>
                        <option value="">--Select a group--</option>
                        <?php foreach ($group as $group) : ?>
                            <?php
                            $selected = ($group['id'] == session('input_data.group')) ? 'selected' : '';
                            ?>
                            <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="ฺrepeat">ฺBudgetRepeat</label>
                    <select class="form-select" name="ฺrepeat" id="ฺrepeat" required>
                        <option value="">-- Select --</option>
                        <option value="0" selected>OneTime</option>
                        <option value="1">1Year(OneTime)</option>
                        <option value="2">2Years</option>
                        <option value="3">3Years</option>
                        <option value="4">4Years</option>
                        <option value="5">5Years</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="end">YearEND</label>
                    <input type="date" class="form-control" name="end" id="end">
                </div>

                <div class="form-group col-md-2">
                    <label for="devision">Devision/DEPT</label>
                    <select class="form-select" name="devision" id="devision" required>
                        <option value="">-- Select Devision --</option>
                        <?php foreach ($devision as $devision) : ?>
                            <?php
                            $selected = ($devision['id'] == session('input_data.devision')) ? 'selected' : '';
                            ?>
                            <option value="<?= $devision['id'] ?>" <?= $selected ?>><?= $devision['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="user">User</label>
                    <input type="text" class="form-control" name="user" id="user">
                </div>
                <div class="form-group col-md-2">
                    <label for="unit">Unit</label>
                    <input type="number" class="form-control" name="unit" id="unit" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="payment">PaymentMode</label>
                    <select class="form-select" name="payment" id="payment" required>
                        <option value="">-- Select Type --</option>
                        <option value="1" selected>CASH</option>
                        <option value="2">Credit30Day</option>
                        <option value="3">Credit60Day</option>
                        <option value="4">Extra1</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="proposed">Proposed</label>
                    <input type="date" class="form-control" name="proposed" id="proposed" required>
                </div>


            </div>
            <div class="row">
                <div class="card-header">
                    <h5 class="card-title mb-0"> ฺBudget Detail </h5>
                </div>
                <div class="form-group col-md-4">
                    <label for="cost">ฺBudgeted Cost (THB)</label>
                    <input type="number" class="form-control" name="cost" id="cost" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="detail">ฺBudget Detail</label>
                    <input type="text" class="form-control" name="detail" id="detail" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="remark">Remark</label>
                    <input type="text" class="form-control" name="remark" id="remark" required>
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
        <h5 class="card-title mb-0"> Input_budget List </h5>
    </div>

    <div class="card-body">
        <div class="row ">

            <div class="col-md-12">
                <hr>

                <label for="remark">
                    <h4 class="card-title mb-0">Filter by Dept : </h4>
                </label>
                <?php foreach ($devision2 as $devision2) : ?>
                    <input type="checkbox" name="dept" value="<?= $devision2['name'] ?>"> <?= $devision2['name'] ?>&nbsp;&nbsp;&nbsp;
                <?php endforeach; ?>
                <!-- <input type="checkbox" name="dept" value="Accounting">Accounting
                <input type="checkbox" name="dept" value="Store">Store
                <input type="checkbox" name="dept" value="Javascript Developer">Javascript Developer
                <input type="checkbox" name="dept" value="System Architect">System Architect -->
            </div>

        </div>
        <hr>
        <div class="table-responsive">
            <table id="groupTable" class="display">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>name</th>
                        <th>detail</th>
                        <th>cost(THB)</th>
                        <th>remark</th>
                        <th>Department</th>
                        <th>proposed</th>
                        <th>Creater</th>
                        <th>create_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowNumber = 1; // Initialize row number
                    foreach ($budget as $budget) : ?>
                        <tr>
                            <td><?= $rowNumber; ?></td>
                            <td><?= $budget['name']; ?></td>
                            <td><?= $budget['detail']; ?></td>
                            <td><?= $budget['cost']; ?></td>
                            <td><?= $budget['remark']; ?></td>
                            <td><?= $budget['department_name']; ?></td>
                            <td><?= $budget['proposed']; ?></td>
                            <td><?= $budget['creater']; ?></td>
                            <td><?= $budget['create_at']; ?></td>
                            <td>
                                <!-- Use data attributes to store category data for the modal -->
                                <button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" 
                                data-id="<?= $budget['id']; ?>" 
                                data-name="<?= $budget['name']; ?>" 
                                data-detail="<?= $budget['detail']; ?>" 
                                data-remark="<?= $budget['remark']; ?>"
                                    >Edit
                                </button>

                                <button class="btn btn-sm btn-success actual-btn" data-bs-toggle="modal" data-bs-target="#editActualModal"
                                data-id="<?= $budget['id']; ?>" 
                                data-cost="<?= $budget['cost']; ?>" 
                                data-actual="<?= $budget['actual']; ?>" 
                                    >Actual
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $budget['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php
                        $rowNumber++; // Increment row number
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Budget </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('InputBudget/updateBudget'); ?>" method="post" id="editForm">
                    <input type="hidden" name="budgetID" id="budgetID">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Budget Name</label>
                            <input type="text" class="form-control" name="editName" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDetail" class="form-label">Budget Detail</label>
                            <input type="text" class="form-control" name="editDetail" id="editDetail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRemark" class="form-label">Budget Remark</label>
                            <input type="text" class="form-control" name="editRemark" id="editRemark" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Budget</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editActualModal" tabindex="-1" aria-labelledby="editLabel2" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Input Actual </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('InputBudget/updateActual'); ?>" method="post" id="editForm">
                    <input type="hidden" name="budgetID" id="budgetID">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCost" class="form-label">Budget cost </label>
                            <input type="text" class="form-control" name="editCost" id="editCost" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editActual" class="form-label">Budget Actual</label>
                            <input type="text" class="form-control" name="editActual" id="editActual" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Actual</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Get references to the input fields
    const unitInput = document.getElementById('unit');
    const priceInput = document.getElementById('price');
    const totalInput = document.getElementById('cost');

    // Add event listeners for input changes
    unitInput.addEventListener('input', updateTotal);
    priceInput.addEventListener('input', updateTotal);

    // Function to calculate and update the Total
    function updateTotal() {
        const unit = parseFloat(unitInput.value) || 0; // Parse the value, default to 0 if not a valid number
        const price = parseFloat(priceInput.value) || 0; // Parse the value, default to 0 if not a valid number

        const cost = unit * price;

        // Update the Total field
        totalInput.value = cost.toFixed(2); // Display the total with two decimal places
    }
    $(document).ready(function() {
        $.fn.dataTable.ext.search.push(
            function(settings, searchData, index, rowData, counter) {
                var department = $('input:checkbox[name="dept"]:checked').map(function() {
                    return this.value;
                }).get();

                if (department.length === 0) {
                    return true;
                }

                if (department.indexOf(searchData[5]) !== -1) { //filter ที่ column 1
                    return true;
                }

                return false;
            }
        );

        $('input:checkbox').on('change', function() {
            var groupTable = $('#groupTable').DataTable();
            groupTable.draw();
        });

    });

    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get data from edit button attributes
            const name = button.getAttribute('data-name');
            const detail = button.getAttribute('data-detail');
            const remark = button.getAttribute('data-remark');
            const id = button.getAttribute('data-id');

            // Populate the modal form fields
            document.getElementById('editName').value = name;
            document.getElementById('editDetail').value = detail;
            document.getElementById('editRemark').value = remark;
            document.getElementById('budgetID').value = id;
        });
    });
    const actualButtons = document.querySelectorAll('.actual-btn');
    actualButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = button.getAttribute('data-id');
            const cost = button.getAttribute('data-cost');
            const actual = button.getAttribute('data-actual');

            // Populate the modal form fields
            document.getElementById('editCost').value = cost;
            document.getElementById('editActual').value = actual;
            document.getElementById('budgetID').value = id;
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
                window.location.href = '<?= base_url('InputBudget/delete/'); ?>' + id;
            } else {
                // User canceled the operation
                // You can add additional logic here if needed
            }
        });
    }
</script>
<?= $this->endSection(); ?>