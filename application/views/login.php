<?php $this->load->view('includes/header'); ?>
<div class="card p-5">
	<div class="card-body">
		<h3 class="card-title mb-5">LOGIN PAGE</h3>
		<h5 class="card-title">Login</h5>
		<form action="<?= base_url(); ?>login/checkLogin" method="post">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger"><?= validation_errors(); ?></div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('errorlogin')): ?>
			<?php endif; ?>
			<?= form_open('form'); ?>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" name="email"
						   value="<?= set_value('email'); ?>" aria-describedby="emailHelp"
						   placeholder="Enter email" required>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="form-group mt-3">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password"
						   placeholder="Password" required>
				</div>
			</div>
			<input type="hidden" name="submit" value="1">
			<button type="submit" class="btn btn-primary mt-3">Login</button>
			<small class="form-control mt-3">Are you not registered? <a
						href="<?= base_url(); ?>register">Register</a></small>
		</form>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
