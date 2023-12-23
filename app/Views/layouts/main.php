<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Budget System</title>




	<link href="<?= base_url('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.1.1_dist_css_bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/fonts.googleapis.com_css2_family=Inter_wght@300;400;600&display=swap.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">

	<!-- Add DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/cdn.datatables.net_1.13.6_css_jquery.dataTables.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/cdn.datatables.net_buttons_2.4.1_css_buttons.dataTables.min.css') ?>">

	<!-- select2 css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') ?>">

	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

	<!-- app js -->
	<script src="<?= base_url('assets/js/app.js') ?>"></script>

	<!-- add jquery before dataTable Only!!! -->
	<script src="<?= base_url('assets/js/code.jquery.com_jquery-3.7.0.js') ?>"></script>

	<!-- Add DataTables JavaScript -->
	<script src="<?= base_url('assets/js/cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdn.datatables.net_buttons_2.4.1_js_dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdn.datatables.net_buttons_2.1.0_js_buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdn.datatables.net_buttons_2.1.0_js_buttons.print.min.js') ?>"></script>

	<!-- select2 js -->
	<script src="<?= base_url('assets/js/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js') ?>"></script>

	<!-- Additional libraries for export -->
	<script src="<?= base_url('assets/js/cdnjs.cloudflare.com_ajax_libs_jszip_3.1.3_jszip.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdnjs.cloudflare.com_ajax_libs_pdfmake_0.1.32_pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdnjs.cloudflare.com_ajax_libs_pdfmake_0.1.32_vfs_fonts.js') ?>"></script>
	<script src="<?= base_url('assets/js/cdn.datatables.net_buttons_2.4.1_js_buttons.colVis.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


	<!-- ... other head content ... -->
</head>

<body>
	<div class="wrapper">
		<?= $this->include('layouts/sidebar'); ?>
		<div class="main">
			<!-- HEADER: MENU + HEROE SECTION -->
			<?= $this->include('layouts/header'); ?>
			<!-- CONTENT -->
			<main class="content">
				<div class="container-fluid p-0">
					<?= $this->include('common/alerts'); ?>
					<!-- Place the column visibility container here -->
					<!-- <div id="colvis-container"></div> -->
					<?= $this->renderSection('content'); ?>
				</div>
			</main>
			<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
			<?= $this->include('layouts/footer'); ?>
		</div>
	</div>
	<!-- Include the DataTables initialization script -->
	<?= $this->include('script/datatables_init'); ?>

	<!-- Edit Profile Modal -->
	<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editLabel">Edit Profile</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('users/updateUser2'); ?>" method="post" id="editForm">
					

						<div class="mb-3">
							<label for="inputFullname" class="form-label">Fullname</label>
							<input type="text" class="form-control" name="inputFullname" id="inputFullname" value="<?= session()->get('fullname'); ?>" required>
						</div>

						<div class="mb-3">
							<label for="inputUsername" class="form-label">Username</label>
							<input type="text" class="form-control" name="inputUsername" id="inputUsername" value="<?= session()->get('username'); ?>" required readonly>
						</div>
						<div class="mb-3">
							<label for="inputPassword" class="col-form-label">Password:</label>
							<input type="password" class="form-control" name="inputPassword" id="inputPassword">
						</div>
						<!-- Add other form fields for editing profile information -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- 
	<script>
		function openEditProfileModal(event) {
			var userId = $(event.target).data('user-id');
			var fullname = $(event.target).data('fullname');
			var username = $(event.target).data('username');

			// Set user information in the modal
			$('#userId').val(userId);
			$('#editFullname').val(fullname);
			$('#editUsername').val(username);

			// Show the modal
			$('#editProfileModal').modal('show');
		}
	</script> -->

</body>


</html>