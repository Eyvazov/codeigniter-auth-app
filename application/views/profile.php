<?php $this->load->view('includes/header');?>
<div class="card p-5">
	<div class="card-body">
		<h3 class="card-title mb-5">Welcome <?= xss($this->session->userdata('user_name')); ?></h3>
		<p class="card-title">Click the button in the upper right corner to log out</p>
	</div>
</div>
<?php $this->load->view('includes/footer');?>
