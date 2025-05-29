<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}"
    data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}"
    data-kt-sticky-animation="false">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="index.html" class="d-lg-none">
                <!-- <img alt="Logo" src="</?= base_url() ?>assets/media/logos/default-small.svg" class="h-30px" /> -->
                <img alt="Iddocare Logo" width="100px" class="h-30px"
                    src="<?= base_url() ?>assets/logo/iddocarelogo.png" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                        class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-title">Modules</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-850px">
                            <!--begin:Dashboards menu-->
                            <div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible"
                                data-kt-menu-dismiss="true">
                                <!--begin:Row-->
                                <div class="row">
                                    <!--begin:Col-->
                                    <?php if (session('role') == 'ADMIN') : ?>
                                        <div class="col-lg-8 mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
                                            <!--begin:Row-->

                                            <div class="row">
                                                <!--begin:Col-->
                                                <?php if (isset($Modules['Modulelinks']) && is_array($Modules['Modulelinks'])) : ?>
                                                    <?php foreach ($Modules['Modulelinks'] as $data) : ?>
                                                        <div class="col-lg-6 mb-3">
                                                            <!--begin:Menu item-->
                                                            <div class="menu-item p-0 m-0">
                                                                <!--begin:Menu link-->
                                                                <a href="<?= base_url() ?><?= $data['module_name'] ?>/<?= $data['module_link'] ?>"
                                                                    class=" menu-link">
                                                                    <span
                                                                        class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                        <i
                                                                            class="ki-duotone ki-element-11 <?= $data['module_color'] ?> fs-1">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                            <span class="path4"></span>
                                                                        </i>
                                                                    </span>
                                                                    <span class="d-flex flex-column">
                                                                        <span
                                                                            class="fs-6 fw-bold text-gray-800"><?= ucwords($data['module_name']) ?>
                                                                        </span>
                                                                        <span
                                                                            class="fs-7 fw-semibold text-muted"><?= $data['module_title'] ?></span>
                                                                    </span>
                                                                </a>
                                                                <!--end:Menu link-->
                                                            </div>
                                                            <!--end:Menu item-->
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <!--end:Col-->
                                            </div>
                                            <!--end:Row-->
                                            <div class="separator separator-dashed mx-5 my-5"></div>
                                            <!--begin:Landing-->
                                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-2 mx-5">
                                                <div class="d-flex flex-column me-5">
                                                    <div class="fs-6 fw-bold text-gray-800">Module Template</div>
                                                    <div class="fs-7 fw-semibold text-muted">Add module name and links for
                                                        easy navigation</div>
                                                </div>
                                                <a href="<?= base_url() ?>add-module-link"
                                                    class="btn btn-sm btn-primary fw-bold">Add Module Link</a>
                                            </div>
                                            <!--end:Landing-->
                                        </div>
                                    <?php endif; ?>
                                    <!--end:Col-->
                                    <!--begin:Col-->

                                    <!--end:Col-->
                                </div>
                                <!--end:Row-->
                            </div>
                            <!--end:Dashboards menu-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->

                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::Search-->
                <!--begin::Theme mode-->
                <div class="app-navbar-item ms-1 ms-md-4">
                    <!--begin::Menu toggle-->
                    <a href="#"
                        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                        data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-night-day theme-light-show fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                            <span class="path7"></span>
                            <span class="path8"></span>
                            <span class="path9"></span>
                            <span class="path10"></span>
                        </i>
                        <i class="ki-duotone ki-moon theme-dark-show fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--begin::Menu toggle-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Light</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-moon fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Dark</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-screen fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <span class="menu-title">System</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Theme mode-->
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <?php if (!empty($AdminData['photo']) && file_exists('uploads/profile/image/' . $AdminData['photo'])) : ?>
                            <img src="<?= base_url() . 'uploads/profile/image/' . $AdminData['photo'] ?>" alt="image" />
                        <?php else : ?>
                            <img src="<?= base_url() ?>assets/media/avatars/blank.png" alt="Temporary Image" />
                            <!-- Use the placeholder image here -->
                        <?php endif; ?>
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <?php if (!empty($AdminData['photo']) && file_exists('uploads/profile/image/' . $AdminData['photo'])) : ?>
                                        <img src="<?= base_url() . 'uploads/profile/image/' . $AdminData['photo'] ?>"
                                            alt="image" />
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>assets/media/avatars/blank.png" alt="Temporary Image" />
                                        <!-- Use the placeholder image here -->
                                    <?php endif; ?>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-8">
                                        <?= session()->get('firstname') ?> <?= session()->get('lastname') ?>
                                        <span
                                            class="badge badge-light-success fw-bold fs-10 px-2 py-1 ms-2"><?= session()->get('role') ?></span>
                                    </div>
                                    <a href="#"
                                        class="fw-semibold text-muted text-hover-primary fs-7"><?= session()->get('email') ?></a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5">
                            <a href="<?= base_url() ?>admin/profile" class="menu-link px-5">My Profile</a>
                        </div>


                        <div class="menu-item px-5 my-1">
                            <a href="<?= base_url() ?>admin/profile/setting" class="menu-link px-5">Account Settings</a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="<?= base_url() ?>admin-panel/logout" class="menu-link px-5">Sign Out</a>
                        </div>

                    </div>

                </div>

                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                        id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-element-4 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Header menu toggle-->
                <!--begin::Aside toggle-->
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->