<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->

            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->

                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1
                            class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Account Overview</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Account</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">

                    <?= view(MODULE_ADMIN_VIEWS . '/template/profiletab') ?>
                    <!--begin::details View-->
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                <!--begin::Card header-->
                                <div class="card-header cursor-pointer">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Profile Details</h3>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Action-->
                                    <a href="<?= base_url() . 'admin/profile/setting' ?>"
                                        class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
                                    <!--end::Action-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body p-9">
                                    <!--begin::Row-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800"><?= isset($AdminData['first_name']) ? $AdminData['first_name'] : "" ?>
                                                <?= isset($AdminData['last_name']) ? $AdminData['last_name'] : "" ?></span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Phone number must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AdminData['phone']) ? $AdminData['phone'] : "" ?></span>

                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Email
                                            <span class="ms-1" data-bs-toggle="tooltip" title=" address must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AdminData['email']) ? $AdminData['email'] : "" ?></span>
                                            <span class="badge badge-success">Verified</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Address
                                            <span class="ms-1" data-bs-toggle="tooltip" title=" address must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AdminData['address']) ? $AdminData['address'] : "" ?></span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->



                                    <!--begin::Notice-->

                                    <!--end::Notice-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </div>
                    <!--end::details View-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?>

<script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>

<script src="<?= base_url() ?>assets/js/custom/account/settings/signin-methods.js"></script>
<script src="<?= base_url() ?>assets/js/custom/account/settings/profile-details.js"></script>
<script src="<?= base_url() ?>assets/js/custom/account/settings/deactivate-account.js"></script>
<script src="<?= base_url() ?>assets/js/custom/pages/user-profile/general.js"></script>
<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/two-factor-authentication.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>
<?= $this->endSection() ?>