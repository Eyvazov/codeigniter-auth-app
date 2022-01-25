<?php $this->load->view('includes/header'); ?>
<div class="card p-5">
	<div class="card-body">
		<h3 class="card-title mb-5">REGISTER PAGE</h3>
		<h5 class="card-title">Register</h5>
		<form action="<?= base_url(); ?>register/registerController" method="post">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger"><?= validation_errors(); ?></div>
			<?php endif; ?>
			<?php if (isset($success)): ?>
				<span class="text-primary"><?= $success; ?></span>
			<?php endif; ?>
			<?php if (isset($danger)): ?>
				<span class="text-danger"><?= $danger; ?></span>
			<?php endif; ?>

			<?= form_open('form'); ?>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="form-group mt-3">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>"
							   placeholder="Enter your Name and Surname" required>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="form-group mt-3">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1"
							   value="<?= set_value('email') ?>" name="email" aria-describedby="emailHelp"
							   placeholder="Enter email" required>
					</div>
				</div>
				<div class="form-group mt-3">
					<label for="birthday">Your Birthday</label>
					<input type="date" class="form-control" id="birthday" name="birthday"
						   value="<?= set_value('birthday') ?>" placeholder="Enter your birthday">
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="form-group mt-3">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password"
							   placeholder="Password" required>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group mt-3">
						<label for="password_confirm">Password Confirm</label>
						<input type="password" class="form-control" id="password_confirm" name="password_confirm"
							   placeholder="Password Confirm" required>
					</div>
				</div>
			</div>
			<input type="hidden" name="submit" value="1">
			<button type="submit" class="btn btn-primary mt-3">Register</button>
			<small class="form-control mt-3">Are you registered? <a href="<?= base_url(); ?>login">Login</a></small>
		</form>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
