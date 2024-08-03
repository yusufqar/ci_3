
<body>
	<!-- Main content -->
    <div class="content row" style="height: 48rem">
      <div class="container-fluid col-sm-6 m-auto">				
				<div class="card">
					<form action="<?= base_url('auth/login_action'); ?>" method="post" role="form" id="quickForm">
						<div class="card-body">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<div class="form-group mb-0">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
							<div class="form-group mb-0">
								<a href="<?= base_url('auth/register') ?>" >Register</a>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>		
	  </div>
	</div>	
	<!-- jQuery -->
	<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables -->
	<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
	<!-- page script -->
	<script>
	$(function () {
		$("#example1").DataTable({
		"responsive": true,
		"autoWidth": false,
		});
		$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		});
	});
	</script>
</body>
</html>
