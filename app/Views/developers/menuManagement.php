<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> </h1>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Create New Menu </h5>
		</div>
		<div class="card-body">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Menu Category</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="false">Menu</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link  <?= 'disabled' ; ?>" id="submenu-tab" data-bs-toggle="tab" data-bs-target="#submenu" type="button" role="tab" aria-controls="submenu" aria-selected="false">Submenu</button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="mt-3">
						<div class="row">
							<div class="col-6">
								<table class="table">
									<thead>
										<th>#</th>
										<th>Menu Categories</th>
										<th>Action</th>
										<th>Delete</th>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($MenuCategories as $menuCategories) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $menuCategories['menu_category']; ?></td>
												<td>
													<button class="btn btn-info btn-sm btnEditCat" data-bs-toggle="modal" data-bs-target="#formCatModal" data-id="<?= $menuCategories['id']; ?>" data-catName="<?= $menuCategories['menu_category']; ?>">Update</button>
												</td>
												<td>
													<?php if (!$menuModel->getMenusByCategory($menuCategories['id'])) : ?>

														<form action="<?= base_url('menuManagement/deleteCat/' . $menuCategories['id']); ?>" method="post" class="d-inline">
															<input type="hidden" name="_method" value="DELETE">
															<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete <?= $menuCategories['menu_category']; ?> ?')">Delete</button>
														</form>

													<?php else : ?>
														<!-- Display some message or handle accordingly when access_role_id is not null -->
														<span class="text-muted">in use</span>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="col-6">
								<h5 class="fw-bold text-primary">Create New Menu Category</h5>
								<hr>
								<form action="<?= base_url('menuManagement/createMenuCategory'); ?> " method="post">
									<div class="mb-3">
										<label for="inputMenuCategory" class="form-label">Add Menu Category</label>
										<input type="text" class="form-control <?= ($validation->hasError('inputMenuCategory')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenuCategory'); ?>" id=" inputMenuCategory" name="inputMenuCategory" placeholder="Menu Category Name">
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenuCategory'); ?>
										</div>
									</div>
									<div class="text-end">
										<button class="btn btn-primary ">Save Menu Category</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="menu" role="tabpanel" aria-labelledby="menu-tab">
					<div class="mt-3">
						<div class="row">
							<div class="col-sm-6">
								<table class="table">
									<thead>
										<th>#</th>
										<th>Menu Category</th>
										<th>Menu Icon</th>
										<th>Menu Title</th>
										<th>Menu Url</th>
										<th>Action</th>
										<th>Delete</th>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($Menus as $menu) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $menu['menu_category']; ?></td>
												<td> <i class="align-middle" data-feather="<?= $menu['icon']; ?>"></i> </td>
												<td><?= $menu['title']; ?></td>
												<td><?= $menu['url']; ?></td>
												<td>
													<button class="btn btn-info btn-sm btnEditRole" data-bs-toggle="modal" data-bs-target="#formRoleModal" data-id="<?= $menu['menu_id']; ?>" data-name="<?= $menu['title']; ?>" data-catid="<?= $menu['menu_category_id']; ?>">Update</button>


												</td>
												<td>
													<?php if ($menu['access_menu_id'] === null) : ?>
														<form action="<?= base_url('menuManagement/deleteMenu/' . $menu['menu_id']); ?>" method="post" class="d-inline">
															<input type="hidden" name="_method" value="DELETE">
															<button class="btn btn-danger btn-sm">Delete</button>
														</form>
													<?php else : ?>
														<!-- Display some message or handle accordingly when access_role_id is not null -->
														<span class="text-muted">in use</span>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="col-sm-6">
								<h5 class="fw-bold text-primary">Create New Menu</h5>
								<hr>
								<form action="<?= base_url('menuManagement/createMenu'); ?>" method="post">
									<div class="mb-3">
										<label for="inputMenuCategory2" class="form-label">Menu Category</label>
										<select name="inputMenuCategory2" id="inputMenuCategory2" class="form-control <?= ($validation->hasError('inputMenuCategory2')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenuCategory2	'); ?>">
											<option value=""> -- Choose Menu Category --</option>
											<?php foreach ($MenuCategories as $menuCategory) : ?>
												<option value="<?= $menuCategory['id']; ?>"><?= $menuCategory['menu_category']; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenuCategory2'); ?>
										</div>
									</div>
									<div class="mb-3">
										<label for="inputMenuTitle" class="form-label">Menu Title</label>
										<input type="text" class="form-control <?= ($validation->hasError('inputMenuTitle')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenuTitle'); ?>" id="inputMenuTitle" name="inputMenuTitle">
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenuTitle'); ?>
										</div>
									</div>
									<div class="mb-3">
										<label for="inputMenuURL" class="form-label">Menu URL</label>
										<input type="text" class="form-control <?= ($validation->hasError('inputMenuURL')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenuURL'); ?>" id="inputMenuURL" name="inputMenuURL">
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenuURL'); ?>
										</div>
									</div>
									<div class="mb-3">
										<label for="inputMenuIcon" class="form-label">Menu Icon <a href="https://feathericons.com/" target="_blank" rel="noopener noreferrer">(Lookup References)</a> </label>
										<input type="text" class="form-control <?= ($validation->hasError('inputMenuIcon')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenuIcon'); ?>" id="inputMenuIcon" name="inputMenuIcon">
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenuIcon'); ?>
										</div>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="optionPage" id="optionPage1" value="0" required>
										<label class="form-check-label" for="optionPage1">Create Blank Page</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="optionPage" id="optionPage2" value="1" required>
										<label class="form-check-label" for="optionPage2">Create List and Form Pages</label>
									</div>
									<div class="text-end mt-3">
										<button class="btn btn-primary ">Save Menu</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="submenu" role="tabpanel" aria-labelledby="submenu-tab">
					<div class="mt-3">
						<div class="row">
							<div class="col-sm-6">
								<table class="table">
									<thead>
										<th>#</th>
										<th>Menu Category</th>
										<th>Menu </th>
										<th>Submenu Title</th>
										<th>Submenu Url</th>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($Submenus as $submenu) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $submenu['menu_category']; ?></td>
												<td><?= $submenu['menu_title']; ?> </td>
												<td><?= $submenu['title']; ?></td>
												<td><?= $submenu['url']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="col-sm-6">
								<h5 class="fw-bold text-primary">Create New Submenu</h5>
								<hr>
								<form action="<?= base_url('menuManagement/createSubMenu'); ?>" method="post">
									<div class="mb-3">
										<label for="inputMenu1" class="form-label">Menu Parent</label>
										<select name="inputMenu1" id="inputMenu1" class="form-control <?= ($validation->hasError('inputMenu1')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputMenu1'); ?>">
											<option value=""> -- Choose Menu Parent --</option>
											<?php foreach ($Menus as $menu) : ?>
												<option value="<?= $menu['id']; ?>"><?= $menu['title']; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= $validation->getError('inputMenu1'); ?>
										</div>
									</div>
									<div class="mb-3">
										<label for="inputSubmenuTitle" class="form-label">Submenu Title</label>
										<input type="text" class="form-control <?= ($validation->hasError('inputSubmenuTitle')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputSubmenuTitle'); ?>" id="inputSubmenuTitle" name="inputSubmenuTitle">
										<div class="invalid-feedback">
											<?= $validation->getError('inputSubmenuTitle'); ?>
										</div>
									</div>
									<div class="mb-3">
										<label for="inputSubmenuURL" class="form-label">Submenu URL</label>
										<input type="text" class="form-control <?= ($validation->hasError('inputSubmenuURL')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('inputSubmenuURL'); ?>" id=" inputSubmenuURL" name="inputSubmenuURL">
										<div class="invalid-feedback">
											<?= $validation->getError('inputSubmenuURL'); ?>
										</div>
									</div>
									<div class="text-end">
										<button class="btn btn-primary">Save Submenu</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal -->
<div class="modal fade" id="formRoleModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formUserModalLabel">Update Menu</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('xxx/xxx'); ?> " method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="editMenuName" class="form-label">Edit Menu Name</label>
						<input type="text" class="form-control" name="editMenuName" id="editMenuName" required>
					</div>
					<div class="mb-3">
						<label for="editMenuCategory" class="form-label">Select Main Menu Category</label>
						<select class="form-select" name="editMenuCategory" id="editMenuCategory" required>
							<option value="">-- Select a Category --</option>
							<?php if (!empty($MenuCategories)) : ?>
								<?php foreach ($MenuCategories as $menuCategory) : ?>
									<?php
									$selected = ($menuCategory['id'] == $menuCategory['menu_category']) ? 'selected' : '';
									?>
									<option value="<?= $menuCategory['id'] ?>" <?= $selected ?>><?= $menuCategory['menu_category'] ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save menu</button>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- CAT modal -->
<div class="modal fade" id="formCatModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formUserModalLabel">Update Cat</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('xxx/xxx'); ?> " method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="editCat" class="form-label">Edit Cat Name</label>
						<input type="text" class="form-control" name="editCatName" id="editCatName" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save Cat</button>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('.btnEditRole').click(function() {
			var menuId = this.getAttribute('data-id');
			var menuCategory = this.getAttribute('data-catid');
			var menuName = this.getAttribute('data-name');

			// Populate the modal fields with data
			$('#editMenuName').val(menuName);
			$('#editMenuCategory').val(menuCategory);

			// Set the form action URL with the menuId if needed
			var formAction = '<?= base_url('menuManagement/updateMenu'); ?>/' + menuId;
			$('#formRoleModal form').attr('action', formAction);

			// Show the modal
			$('#formRoleModal').modal('show');

		});
		$('.btnEditCat').click(function() {
			var catId = this.getAttribute('data-id');
			var catName = this.getAttribute('data-catName');
			console.log('catId:', catId);
			console.log('catName:', catName);

			// Populate the modal fields with data
			$('#editCatName').val(catName);

			// Set the form action URL with the menuId if needed
			var formAction = '<?= base_url('menuManagement/updateCat'); ?>/' + catId;
			$('#formCatModal form').attr('action', formAction);

			// Show the modal
			$('#formCatModal').modal('show');

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
				window.location.href = '<?= base_url('menuManagement/deleteCat/'); ?>' + id;
			} else {
				// User canceled the operation
				// You can add additional logic here if needed
			}
		});
	}
</script>


<?= $this->endSection(); ?>