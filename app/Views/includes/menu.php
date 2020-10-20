   	<!-- Sidebar -->
   	<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
		<a class="sidebar-brand d-flex align-items-center justify-content-center bg-vue" href="<?= base_url('dashboard') ?>">
			<div class="sidebar-brand-icon">
				<img src="<?= base_url('assets/img/icon-white.png') ?>" alt="Logo" width="35">
			</div>
			<div class="sidebar-brand-text mx-3">Tickets</div>
		</a>

   		<hr class="sidebar-divider my-0">
		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url('calendar') ?>">
				<i class="fas fa-fw fa-calendar"></i>
				<span>Calendar</span></a>
		</li>

   		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Features
		</div>
   
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTickets"
			aria-expanded="true" aria-controls="collapseTickets">
			<i class="fas fa-fw fa-ticket-alt"></i>
			<span>Tickets</span>
			</a>
			<div id="collapseTickets" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Actions</h6>
					<a class="collapse-item" href="<?= base_url('tickets') ?>"> <i class="fa fa-fw fa-plus"></i> Open</a>
					<a class="collapse-item" href="<?= base_url('tickets') ?>"> <i class="fa fa-fw fa-list"></i> List</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
			aria-expanded="true" aria-controls="collapseReports">
			<i class="fas fa-fw fa-print"></i>
			<span>Reports</span>
			</a>
			<div id="collapseReports" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Items</h6>
					<a class="collapse-item" href="<?= base_url('tickets') ?>"> <i class="fa fa-fw fa-plus"></i> Open ticket</a>
					<a class="collapse-item" href="<?= base_url('tickets') ?>"> <i class="fa fa-fw fa-list"></i> List</a>
				</div>
			</div>
		</li>
   		<hr class="sidebar-divider">
   	</ul>
	   
	   <!-- Sidebar -->
   	<div id="content-wrapper" class="d-flex flex-column">
   		<div id="content">
			<!-- TopBar -->
			<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top bg-vue">
				<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-bell fa-fw"></i>
							<span class="badge badge-danger badge-counter"><?= $next_birthday ? count($next_birthday)."+" : "" ?></span>
						</a>
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								Alerts center
							</h6> 
							
							<?php foreach ($next_birthday as $bird): ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-birthday-cake text-white"></i>
										</div>
									</div>

									<div>
										<div class="small text-500">
											<?=utf8_encode(strftime('%A, %d of %B of %Y', strtotime($bird->date_birthday)))?>
										</div>
										<span class="font-weight-bold"><?=strtolower($bird->name) == strtolower(session()->get('firstname')) ? 'YOU' : $bird->name?> - Next birthday</span>
									</div>
								</a>
							<?php endforeach; ?>
							
							<a class="dropdown-item text-center small text-gray-500" href="#">View all alerts</a>
						</div>
					</li>
					<div class="topbar-divider d-none d-sm-block"></div>
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-white-600 small"><?= session()->get('firstname') ?></span>
							<img class="img-profile rounded-circle" src="<?= base_url('assets/img/icon.png') ?>">
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="#">
								<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
								Settings
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= base_url('logout') ?>">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<!-- Topbar -->