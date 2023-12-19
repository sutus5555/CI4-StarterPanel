<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong>Users</strong> Menu </h1>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Users List <button class="btn btn-primary btn-sm float-end btnAdd" data-bs-toggle="modal" data-bs-target="#formUserModal">Create New User</button></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Username</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Users as $users) : ?>
                                <tr>
                                    <td><?= $users['fullname']; ?></td>
                                    <td class="d-none d-md-table-cell"><?= $users['username']; ?></td>
                                    <td><span class="badge bg-success"><?= $users['role_name']; ?></span></td>
                                    <td><?= $users['create_at']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formUserModal" data-id="<?= $users['userID']; ?>" data-fullname="<?= $users['fullname']; ?>" data-username="<?= $users['username']; ?>" data-role="<?= $users['role']; ?>">Update</button>

                                        <?php if ($users['username'] != session()->get('username') && $users['username'] != 'sutus_p@eseco.co.th') : ?>
                                            <form action="<?= base_url('users/deleteUser/' . $users['userID']); ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete <?= $users['username']; ?> ?')">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>


<div class="modal fade" id="formUserModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/createUser'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="userID" id="userID">
                    <div class="mb-3">
                        <label for="inputFullname" class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" name="inputFullname" id="inputFullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputRole" class="col-form-label">Role:</label>
                        <select name="inputRole" id="inputRole" class="form-control" required>
                            <option value="">-- Choose User Role --</option>
                            <?php foreach ($UserRole as $userRole) : ?>
                                <option value="<?= $userRole['id']; ?>"><?= $userRole['role_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send message</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btnAdd").click(function() {
            $('#formUserModalLabel').html('Create New User');
            $('.modal-footer button[type=submit]').html('Save User');
            $('#userID').val('');
            $('#inputFullname').val('');
            $('#inputUsername').val('');
            $('#inputRole').val('');
        });
        $(".btnEdit").click(function() {
            const userId = $(this).data('id');
            const fullname = $(this).data('fullname');
            const username = $(this).data('username');
            const role = $(this).data('role');
            $('#modalTitle').html('form Data User');
            $('.modal-footer button[type=submit]').html('Update User');
            $('.modal-content form').attr('action', '<?= base_url('users/updateUser') ?>');
            $('#userID').val(userId);
            $('#inputFullname').val(fullname);
            $('#inputUsername').val(username);
            $('#inputUsername').attr('readonly', true);
            $('#inputPassword').attr('required', false);
            $('#inputRole').val(role);
        });

        $(".btnAddRole").click(function() {
            $('#formUserModalLabel').html('Create New Role');
            $('.modal-content form').attr('action', '<?= base_url('users/createRole') ?>');
            $('.modal-footer button[type=submit]').html('Save Role');
            $('#roleID').val('');
            $('#inputRoleName').val('');
        });
        $(".btnEditRole").click(function() {
            const roleID = $(this).data('id');
            const inputRoleName = $(this).data('role');
            $('#modalTitle').html('Update Data Role');
            $('.modal-footer button[type=submit]').html('Update role');
            $('.modal-content form').attr('action', '<?= base_url('users/updateRole') ?>');
            $('#roleID').val(roleID);
            $('#inputRoleName').val(inputRoleName);
        });
    });
</script>
<?= $this->endSection(); ?>