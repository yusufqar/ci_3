
<body>
<div class="content row" style="height: 48rem">
	<div class="container-fluid col-sm-6  m-auto">	
		<?php echo validation_errors(); ?>
		<div class="card">
			<form action="<?= base_url('auth/register_action'); ?>" method="post">
				<div class="card-body">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
					</div>	
					<div class="form-group">
						<label>Password:</label>
						<input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Masukan Email disini" required>
					</div>
				</div>
				<div class="card-footer text-center">
					<div class="d-flex justify-content-center w-100">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>	
</body>
</html>
