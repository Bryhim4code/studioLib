	<!--begin::Wrapper-->
	<!-- <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper"> -->
	<!--begin::Sidebar-->

	<?php
	$activeMenuItem = $activeMenuItem ?? ''; // Default to empty string if not set
	?>

	<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
		data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
		data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
		<!--begin::Logo-->
		<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
			<!--begin::Logo image-->
			<a href="<?= base_url() ?>admin/dashboard">
				<img width="100px" alt="Logo" src="<?= base_url() ?>assets/logo/iddocarelogo.png" />


			</a>

			<div id="kt_app_sidebar_toggle"
				class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
				data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
				data-kt-toggle-name="app-sidebar-minimize">

				<i class="ki-duotone ki-book fs-2 ">
					<span class="path1"></span>
					<span class="path2"></span>
					<span class="path3"></span>
					<span class="path4"></span>
				</i>
			</div>
			<!--end::Sidebar toggle-->
		</div>
		<!--end::Logo-->
		<!--begin::sidebar menu-->
		<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
			<!--begin::Menu wrapper-->
			<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
				<!--begin::Scroll wrapper-->
				<div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
					data-kt-scroll-activate="true" data-kt-scroll-height="auto"
					data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
					data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
					data-kt-scroll-save-state="true">
					<!--begin::Menu-->
					<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
						id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

						<div class="menu-item">
							<!--begin:Menu content-->
							<div class="menu-content">
								<span class="menu-heading fw-bold text-uppercase fs-7">PAGES</span>
							</div>
							<!--end:Menu content-->
						</div>

						<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
							<!--begin:Menu link-->
							<span class="menu-link">
								<span class="menu-icon">
									<i class="ki-duotone ki-book fs-2 ">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
										<span class="path4"></span>
									</i>
								</span>
								<span class="menu-title"> Profile</span>
								<span class="menu-arrow"></span>
							</span>
							<!--end:Menu link-->
							<!--begin:Menu item-->

							<!--begin:Menu sub-->
							<div class="menu-sub menu-sub-accordion">
								<!--begin:Menu item-->
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'Admindashboard') ? 'active' : '' ?>"
										href="<?= base_url() ?>admin/dashboard/">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
									<!--end:Menu link-->
								</div>
								<?php if (session('role') == 'STAFF') : ?>
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link " href="<?= base_url() . 'inventory/list-items' ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Inventory</span>
										</a>
										<!--end:Menu link-->
									</div>
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link " href="<?= base_url() . 'ticketing/dashboard' ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Tickets</span>
										</a>
										<!--end:Menu link-->
									</div>
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link " href="<?= base_url() . 'visitor/dashboard' ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Visitors Log</span>
										</a>
										<!--end:Menu link-->
									</div>
								<?php endif; ?>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'profile') ? 'active' : '' ?>"
										href="<?= base_url() ?>admin/profile/">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Profile Details</span>
									</a>
									<!--end:Menu link-->
								</div>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'Announcements') ? 'active' : '' ?>"
										href="<?= base_url() . 'admin/announcements/' ?>">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Announcements</span>
									</a>
									<!--end:Menu link-->
								</div>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'sessions') ? 'active' : '' ?>"
										href="<?= base_url() . 'admin/all-sessions/' ?>">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">School Sessions</span>
									</a>
									<!--end:Menu link-->
								</div>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'paymentscode') ? 'active' : '' ?>"
										href="<?= base_url() ?>admin/payments-codes"> <span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Verify Payment Code </span>
									</a>
									<!--end:Menu link-->
								</div>
								<!--end:Menu item-->
								<!--end:Menu item-->
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'maintanance') ? 'active' : '' ?>"
										href="<?= base_url() . 'admin/maintanance/details' ?>">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Maintanance Details</span>
									</a>
									<!--end:Menu link-->
								</div>

								<?php if (session('role') == 'ADMIN') : ?>
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link <?= ($activeMenuItem == 'bookings') ? 'active' : '' ?>"
											href="<?= base_url() . 'admin/bookings/' ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Active Bookings</span>
										</a>
										<!--end:Menu link-->
									</div>

									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link <?= ($activeMenuItem == 'userList') ? 'active' : '' ?>"
											href="<?= base_url() ?>admin/user-list"> <span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Admin Access List</span>
										</a>
										<!--end:Menu link-->
									</div>
								<?php endif; ?>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'room/master') ? 'active' : '' ?>"
										href="<?= base_url() . 'admin/room/master' ?>">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Current Residents</span>
									</a>
									<!--end:Menu link-->
								</div>
								<div class="menu-item">
									<!--begin:Menu link-->
									<a class="menu-link <?= ($activeMenuItem == 'residentslist') ? 'active' : '' ?>"
										href="<?= base_url() ?>admin/residents/list"> <span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Registrations</span>
									</a>
									<!--end:Menu link-->
								</div>
							</div>
							<!--end:Menu sub-->
						</div>
					</div>
					<!--end::Menu-->
				</div>
				<!--end::Scroll wrapper-->
			</div>
			<!--end::Menu wrapper-->
		</div>
		<!--end::sidebar menu-->
		<!--begin::Footer-->
		<?php if (session('role') == 'STAFF' || session('role') == 'ADMIN') : ?>
			<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
				<a class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
					data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click">
					<span class="btn-label">Settings</span>
					<i class="ki-duotone ki-document btn-icon fs-2 m-0">
						<span class="path1"></span>
						<span class="path2"></span>
					</i>
				</a>
			</div>
		<?php endif; ?>

		<!--end::Footer-->
	</div>
	<!--end::Sidebar-->

	<!-- </div> -->
	<!--end::Wrapper-->