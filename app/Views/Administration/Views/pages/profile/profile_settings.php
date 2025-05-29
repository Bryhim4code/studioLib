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
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Account Settings</h1>
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
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
                    <!--begin::Navbar-->
                    <!--end::Navbar-->
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Profile Details</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form enctype="multipart/form-data" action="<?= base_url() .  'admin/profile/details/update/' . $AdminData['id']  ?>" id="" method="post" class="form">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?= base_url() ?>assets/media/svg/avatars/blank.svg')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?= base_url() . 'uploads/profile/image/' . $AdminData['photo'] ?>)"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="ki-duotone ki-pencil fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="file" accept=".png, .jpg, .jpeg" placeholder="<?= base_url() . 'uploads/profile/image/' . $AdminData['photo'] ?>" style="display: none;" <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki-duotone ki-cross fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki-duotone ki-cross fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">

                                        <!-- <div class="col-lg-6 fv-row"> -->
                                        <input type="hidden" name="id" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="id" value="<?= isset($AdminData['id']) ? $AdminData['id'] : "" ?>" />
                                        <!-- </div> -->
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="firstname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="<?= isset($AdminData['first_name']) ? $AdminData['first_name'] : "" ?>" />
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="lastname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="<?= isset($AdminData['last_name']) ? $AdminData['last_name'] : "" ?>" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="address" class="form-control form-control-lg form-control-solid" placeholder="Home Address" value="<?= isset($AdminData['address']) ? $AdminData['address'] : "" ?>" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Contact Phone</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="<?= isset($AdminData['phone']) ? $AdminData['phone'] : "" ?>" />
                                        </div>

                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <!-- <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label> -->
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <!--begin::Options-->
                                                <div class="d-flex align-items-center mt-3">
                                                    <!--begin::Option-->
                                                    <!-- <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="communication[]" type="checkbox" value="1" />
                                                    <span class="fw-semibold ps-2 fs-6">Email</span>
                                                </label> -->
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <!-- <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="communication[]" type="checkbox" value="2" />
                                                    <span class="fw-semibold ps-2 fs-6">Phone</span>
                                                </label> -->
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-0">
                                            <!--begin::Label-->
                                            <!-- <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label> -->
                                            <!--begin::Label-->
                                            <!--begin::Label-->
                                            <!-- <div class="col-lg-8 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                                                <label class="form-check-label" for="allowmarketing"></label>
                                            </div>
                                        </div> -->
                                            <!--begin::Label-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <!--end::Card body-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button onclick="goBack()" type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                    <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>

                    <!--end::Sign-in Method-->
                </div>
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Change Password</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bold mb-1">Password</div>
                                    <div class="fw-semibold text-gray-600">Update password</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form id="kt_signin_change_email" enctype="multipart/form-data" action="<?= base_url() . 'admin/password/change/' . $AdminData['id'] ?>" id="" method="post" class="form" novalidate="novalidate">
                                        <div class="row mb-1">
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="d-flex">
                                            <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->

                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">Change</button>
                                </div>

                                <!--end::Action-->
                            </div>
                            <!--end::Email Address-->

                            <!--end::Separator-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Sign-in Method-->

                <div class="d-flex justify-content-start">
                    <!--begin::Button-->
                    <a href="<?= base_url() ?>admin/profile/" id="kt_ecommerce_add_product_cancel" class="btn btn-primary me-5">Back to profile</a>
                    <!--end::Button-->

                </div>
                <br>
                <br>
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
<script>
    function validateForm() {
        var newPassword = document.getElementById("newpassword").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        var passwordError = document.getElementById("passwordError");

        if (newPassword !== confirmPassword) {
            passwordError.style.display = "block";
            return false; // Prevent form submission
        } else {
            passwordError.style.display = "none";
            return true; // Allow form submission
        }
    }
</script>
<!--begin::Custom Javascript(used for this page only)-->
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
<!--end::Custom Javascript-->
<script>
    new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
        localization: {
            locale: "en",
            startOfTheWeek: 1,
            format: "dd/MM/yyyy"
        }
    });
</script>
<?= $this->endSection() ?>