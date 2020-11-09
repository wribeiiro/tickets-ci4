<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Wellisson Ribeiro">
	<?= csrf_meta() ?>
	<link href="https://wribeiiro.com/tickets/assets/img/icon.png" rel="icon">
	<title><?=$title?></title>
	<link href="<?=base_url()?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/css/ruang-admin.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/css/app.css?v=<?=CSS_VERSION?>" rel="stylesheet">
</head>

<body class="bg-gradient-login">
	<!-- Login Content -->
	<div class="container-login">
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="card shadow-sm my-5">
					<div class="card-body p-0">
						<div class="login-form">
							<div class="text-center form-group">
								<img src="<?=base_url('assets/img/icon.png')?>" alt="logo" title="logo" width="100" height="auto">
								<h1 class="h4 text-gray-900 mb-4">Authentication</h1>
							</div>
							<form class="user" method="post" id="form" action="<?=base_url('login')?>">
								<?= csrf_field() ?>
								<?php if (isset($validation)): ?>
									<div class="form-group">
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">×</button>

											<?php if (method_exists($validation, 'listErrors')): ?>
												<?=$validation->listErrors()?>
											<?php endif;?>

											<?php if (is_string($validation)): ?>
												<?=$validation?>
											<?php endif;?>
										</div>
									</div>
								<?php endif;?>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-vue" id="basic-addon"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class="form-control" id="login" name="login" placeholder="Enter your login" aria-label="login"
										aria-describedby="basic-addon" required="">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-vue" id="basic-addon1"><i class="fa fa-lock"></i></span>
										</div>
										<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" aria-label="password"
										aria-describedby="basic-addon1" required="">
									</div>
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
										<input type="checkbox" class="custom-control-input" id="customCheck">
										<label class="custom-control-label" for="customCheck">Remember me</label>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-vue btn-primary btn-block form-control-sm" type="submit"> Login </button>
								</div>
							</form>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Login Content -->
	<script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?=base_url()?>/assets/js/ruang-admin.min.js"></script>
</body>
</html>