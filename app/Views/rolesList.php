<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">User Roles <button class="btn btn-primary btn-sm float-end btnAddRole" data-bs-toggle="modal" data-bs-target="#formRoleModal">Create New Role</button></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($UserRole as $userRole) : ?>
                        <tr>
                            <td><?= $userRole['role_name']; ?></td>
                            <td><a href="<?= base_url('Roles/userRoleAccess?role=' . $userRole['id']); ?>"> <span class="badge bg-primary">Access Menu</span></a></td>
                            <td>
                                <button class="btn btn-info btn-sm btnEditRole" data-bs-toggle="modal" data-bs-target="#formRoleModal" data-id="<?= $userRole['id']; ?>" data-role="<?= $userRole['role_name']; ?>">Update</button>
                                <?php if ($userRole['role_name'] != 'Developer') : ?>
                                    <form action="<?= base_url('users/deleteRole/' . $userRole['id']); ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete <?= $userRole['role_name']; ?> ?')">Delete</button>
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
<div class="modal fade" id="formRoleModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formUserModalLabel">Create New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/createRole'); ?> " method="post">
                <div class="modal-body">
                    <input type="hidden" name="roleID" id="roleID">
                    <div class="mb-3">
                        <label for="inputRoleName" class="form-label">Add Role</label>
                        <input type="text" class="form-control" id="inputRoleName" name="inputRoleName" placeholder="Role Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
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