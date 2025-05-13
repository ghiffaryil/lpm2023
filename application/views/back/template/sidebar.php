<body data-col="2-columns" class="2-columns">
	<div class="wrapper">


		<!-- main menu-->
		<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
		<div data-active-color="white" data-background-color="man-of-steel" data-image="<?php echo base_url('app-assets/') ?>img/sidebar-bg/01.jpg" class="app-sidebar">
			<!-- main menu header-->
			<!-- Sidebar Header starts-->
			<div class="sidebar-header">
				<div class="logo clearfix">
					<a href="#" class="logo-text float-left">
						<div class="logo-img">
							<img src="<?php echo base_url('assets/images/company/' . $company_data->company_photo_thumb) ?>" width="100%">
						</div>
						<span class="text align-middle">LPM</span>
					</a>
					<a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
						<i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i>
					</a>
					<a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
						<i class="ft-x"></i>
					</a>
				</div>
			</div>
			<!-- Sidebar Header Ends-->
			<!-- / main menu header-->
			<!-- main menu content-->
			<div class="sidebar-content">
				<div class="nav-container">
					<ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">

						<li class="has-sub nav-item">
							<a href="#">
								<i><img src="<?php echo base_url('assets/images/user/' . $this->session->photo_thumb) ?>" width="100%" style="border-radius: 50%;"></i>
								<span data-i18n="" class="menu-title">
									<?php echo $this->session->name ?>
									<span class="ft ft-check-circle text-blue"></span>
								</span>
							</a>
							<ul class="menu-content">
								<li <?php if ($this->uri->segment(2) == "update_profile") {
										echo "class='active'";
									} else {
										echo "";
									} ?>>
									<a href="<?php echo base_url('auth/update_profile/' . $this->session->id_users) ?>" class="menu-item">
										<span data-i18n="">Update Profil</span>
									</a>
								</li>
								<li <?php if ($this->uri->segment(2) == "change_password") {
										echo "class='active'";
									} else {
										echo "";
									} ?>>
									<a href="<?php echo base_url('auth/change_password') ?>" class="menu-item">
										<span data-i18n="">Ganti Password</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url('auth/logout') ?>" class="menu-item">
										<span data-i18n="" class="menu-title">Keluar</span>
									</a>
								</li>
							</ul>
						</li>

						<?php
						$this->db->join('menu_access', 'menu.id_menu = menu_access.menu_id');
						$this->db->join('submenu', 'menu.id_menu = submenu.id_submenu', 'LEFT');
						$this->db->where('menu_access.usertype_id', $this->session->usertype);
						$this->db->where('menu.is_active', '1');
						$this->db->group_by('menu.id_menu');
						$this->db->order_by('menu.order_no');
						$menu = $this->db->get('menu')->result();
						?>

						<?php foreach ($menu as $m) { ?>
							<?php if ($m->submenu_id == NULL) { ?>
								<?php if (current_url() == base_url() . $m->menu_url) {
									$active = "class='nav-item active'";
								} else {
									$active = "class='nav-item'";
								}
								?>
								<?php if ($m->menu_url == '#') { ?>
									<li <?php echo $active; ?>>
										<a href="<?php echo $_SERVER['REQUEST_URI'] . $m->menu_url ?>">
											<i class="fa <?php echo $m->menu_icon ?>"></i>
											<span data-i18n="" class="menu-title"><?php echo $m->menu_name ?></span>
										</a>
									</li>
								<?php } else { ?>
									<li <?php echo $active; ?>>
										<a href="<?php echo base_url() . $m->menu_url ?>">
											<i class="fa <?php echo $m->menu_icon ?>"></i>
											<span data-i18n="" class="menu-title"><?php echo $m->menu_name ?></span>
										</a>
									</li>
								<?php } ?>
							<?php } else {
								$this->db->join('menu', 'submenu.id_submenu = menu.id_menu', 'LEFT');
								$this->db->join('menu_access', 'submenu.id_submenu = menu_access.submenu_id');
								$this->db->where('submenu.menu_id', $m->id_menu);
								$this->db->where('menu_access.usertype_id', $this->session->usertype);
								$this->db->order_by('submenu.order_no');
								$submenu = $this->db->get('submenu')->result();
							?>

								<li class="has-sub nav-item">
									<a data-toggle="collapse" span data-i18n="" href="#<?php echo $m->menu_slug ?>">
										<i class="fa <?php echo $m->menu_icon ?>"></i>
										<span data-i18n="" class="menu-title"><?php echo $m->menu_name ?></span>
									</a>
									<ul class="menu-content">
										<?php foreach ($submenu as $sm) { ?>
											<?php if (current_url() == base_url() . $sm->submenu_url) {
												$navigation = "class='active'";
											} else {
												$navigation = '';
											} ?>
											<li <?php echo $navigation; ?>>
												<a href="<?php echo base_url() . $sm->submenu_url ?>" class="menu-item">
													<?php echo $sm->submenu_name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</li>
						<?php }
						} ?>

						<li class=" nav-item"><a href="#"><span data-i18n="" class="menu-title">Pengaturan</span></a></li>

						<?php if (is_superadmin()) { ?>
							<li <?php if ($this->uri->segment(2) == "log_list") {
									echo "class='nav-item active'";
								} else {
									echo "class='nav-item'";
								} ?> class="nav-item">
								<a href='<?php echo base_url() ?>auth/log_list'><i class="ft-cpu"></i><span data-i18n="" class="menu-title">Log System Process</span></a>
							</li>
							<li <?php if ($this->uri->segment(1) == "company") {
									echo "class='nav-item active'";
								} else {
									echo "class='nav-item'";
								} ?> class="nav-item">
								<a href='<?php echo base_url() ?>company/update/1'><i class="ft-info"></i><span data-i18n="" class="menu-title">Profil LPM</span></a>
							</li>

							<li class="has-sub nav-item <?php if ($this->uri->segment(1) == "auth" && $this->uri->segment(2) != 'log_list') {
															echo "active submenu";
														} ?> ">
								<a href="#">
									<i class="ft-users"></i><span data-i18n="" class="menu-title">User Management</span></a>
								<ul id="auth" class="menu-content <?php if ($this->uri->segment(1) == "auth" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "auth" && $this->uri->segment(2) == "") {
																		echo "show";
																	} ?>">
									<li <?php if ($this->uri->segment(1) == "auth" && $this->uri->segment(2) == "create") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('auth/create/') ?>" class="menu-item">Tambah User</a>
									</li>
									<li <?php if ($this->uri->segment(1) == "auth" && $this->uri->segment(2) == "") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('auth/') ?>" class="menu-item">Data User</a>
									</li>
								</ul>
							</li>

							<li class="has-sub nav-item <?php if ($this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "") {
															echo "active submenu";
														} ?> ">
								<a href="#">
									<i class="ft-user"></i><span data-i18n="" class="menu-title">User Type</span></a>
								<ul id="usertype" <?php if ($this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "") {
														echo "show";
													} ?>>
									<li <?php if ($this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "create") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('usertype/create/') ?>" class="menu-item">Tambah Usertype</a>
									</li>
									<li <?php if ($this->uri->segment(1) == "usertype" && $this->uri->segment(2) == "") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('usertype/') ?>" class="menu-item">Data Usertype</a>
									</li>
								</ul>
							</li>

							<li class="has-sub nav-item <?php if ($this->uri->segment(1) == "menu" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "menu" && $this->uri->segment(2) == "") {
															echo "active submenu";
														} ?> ">
								<a href="#">
									<i class="ft-menu"></i><span data-i18n="" class="menu-title">Menu</span></a>
								<ul id="menu" <?php if ($this->uri->segment(1) == "menu" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "menu" && $this->uri->segment(2) == "") {
													echo "show";
												} ?>>
									<li <?php if ($this->uri->segment(1) == "menu" && $this->uri->segment(2) == "create") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('menu/create/') ?>" class="menu-item">Tambah Menu</a>
									</li>
									<li <?php if ($this->uri->segment(1) == "menu" && $this->uri->segment(2) == "") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('menu/') ?>" class="menu-item">Data Menu</a>
									</li>
								</ul>
							</li>

							<li class="has-sub nav-item <?php if ($this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "") {
															echo "active submenu";
														} ?> ">
								<a href="#">
									<i class="ft-corner-left-up"></i><span data-i18n="" class="menu-title">Sub Menu</span></a>
								<ul id="submenu" <?php if ($this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "") {
														echo "show";
													} ?>>
									<li <?php if ($this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "create") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('submenu/create/') ?>" class="menu-item">Tambah SubMenu</a>
									</li>
									<li <?php if ($this->uri->segment(1) == "submenu" && $this->uri->segment(2) == "") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('submenu/') ?>" class="menu-item">Data SubMenu</a>
									</li>
								</ul>
							</li>

							<li class="has-sub nav-item <?php if ($this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "") {
															echo "active submenu";
														} ?>">
								<a href="#">
									<i class="ft-log-in"></i><span data-i18n="" class="menu-title">Menu Akses</span></a>
								<ul id="menuaccess" <?php if ($this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "create" or $this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "") {
														echo "show";
													} ?>>
									<li <?php if ($this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "create") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('menuaccess/create/') ?>" class="menu-item">Tambah Menu Akses</a>
									</li>
									<li <?php if ($this->uri->segment(1) == "menuaccess" && $this->uri->segment(2) == "") {
											echo "class='active'";
										} ?>>
										<a href="<?php echo base_url('menuaccess/') ?>" class="menu-item">Data Menu Akses</a>
									</li>
								</ul>
							</li>
						<?php } ?>

						<!--li class=" nav-item"><a href="#"><i class="ft-book"></i><span data-i18n="" class="menu-title">BackUp</span></a>
            </li>
			<li class=" nav-item"><a href="#"><i class="ft-book"></i><span data-i18n="" class="menu-title">Restore</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-book"></i><span data-i18n="" class="menu-title">Documentation</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Support</span></a>
            </li-->
					</ul>
				</div>
			</div>
			<!-- main menu content-->
			<div class="sidebar-background"></div>
			<!-- main menu footer-->
			<!-- include includes/menu-footer-->
			<!-- main menu footer-->
		</div>
		<!-- / main menu-->