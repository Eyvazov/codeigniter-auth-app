<!doctype html>
<html lang="az">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title><?=$this->config->config["pageTitle"]?></title>
</head>
<body class="bg-light">
<div class="container">
	<nav class="navbar navbar-light justify-content-between">
		<a href="<?= base_url(); ?>profile" class="navbar-brand">Auth Application</a>
		<?php if($this->session->userdata('user_name')):?>
			<a href="<?= base_url(); ?>login/logout" class="btn btn-danger">Log Out</a>
		<?php endif; ?>
	</nav>
</div>
<div class="d-flex flex-column justify-content-center align-items-center" style="padding-top: 5%;">
	<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">

