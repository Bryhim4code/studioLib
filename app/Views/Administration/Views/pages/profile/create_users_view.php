<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class=" flex-column flex-column-fluid flex-center w-lg-100 py-0 p-20">
        <!--begin::Wrapper-->
        <div class=" justify-content-between flex-column-fluid flex-column w-100 ">
            <!--begin::Header-->
            <!--end::Header-->
            <!--begin::Body-->
            <div class="py-20">
                <!--begin::Form-->
                <?php if (!empty(session('validation_errors'))) : ?>
                <div class="alert alert-danger">
                    <p>Please correct the following :</p>
                    <ul>
                        <?php foreach (session('validation_errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- </?= base_url() . (isset($mode) && $mode === 'edit' ? 'inventory/category/update-ctg-details/' . $Id : 'inventory/add-categories') ?>" -->
                <form class="form w-300" novalidate="novalidate" id="kt_sign_up_form"
                    action="<?= base_url() . (isset($mode) && $mode === 'edit' ? 'admin/user/update-admin-details/' . $Id : 'admin/create-users') ?>"
                    method="post">
                    <!--begin::Heading-->
                    <div class="text-start mb-10">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-up-title">Create an Account</h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Experience
                            unlimited access to relaxation and tranquility</div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                placeholder="First Name" name="first_name" value="<?= isset($UserInfo['first_name']) ? esc($UserInfo['first_name']) : '' ?>"
"
                                autocomplete="off" data-kt-translate="sign-up-input-first-name" required />
                            <div class="invalid-feedback">First Name is required.</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                placeholder="Last Name" name="last_name" value="<?= isset($UserInfo['last_name']) ? esc($UserInfo['last_name']) : '' ?>"
"
                                autocomplete="off" data-kt-translate="sign-up-input-last-name" required />
                            <div class="invalid-feedback">Last Name is required.</div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <input class="form-control form-control-lg form-control-solid" type="email"
                                placeholder="Email" name="email" value="<?= isset($UserInfo['email']) ? esc($UserInfo['email']) : '' ?>"
" autocomplete="off"
                                data-kt-translate="sign-up-input-email" required />
                            <div class="invalid-feedback">Email is required.</div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="Password" name="password" autocomplete="off"
                                    data-kt-translate="sign-up-input-password" required />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-2"></i>
                                    <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of
                            letters, numbers & symbols.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <input class="form-control required form-control-lg form-control-solid" type="password"
                            placeholder="Confirm Password" name="confirmpassword" autocomplete="off"
                            data-kt-translate="sign-up-input-confirm-password" required />
                        <div class="invalid-feedback">Password confirmation is required.</div>
                        <div class="text-danger" id="password-error"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-stack">
                        <!--begin::Submit-->
                        <button type="submit" class="btn btn-primary" data-kt-translate="sign-up-submit">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Submit</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                        <!--end::Submit-->
                        <!--begin::Social-->
                        <!--end::Social-->
                    </div>
                    <!--end::Actions-->
                </form>

                <!--end::Form-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->

            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--begin::Main-->

    <!--end:::Main-->

    <!--end:::Main-->
</div>

<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?>
<script>
document.getElementById('kt_sign_up_form').addEventListener('submit', function(event) {
    var form = this;
    var isValid = true;

    // Clear previous error messages
    var errorMessages = form.querySelectorAll('.invalid-feedback');
    errorMessages.forEach(function(error) {
        error.style.display = 'none';
    });

    // Check required fields
    var requiredFields = form.querySelectorAll('input[required]');
    requiredFields.forEach(function(field) {
        if (!field.value) {
            isValid = false;
            var error = field.nextElementSibling;
            if (error && error.classList.contains('invalid-feedback')) {
                error.style.display = 'block';
            }
        }
    });

    // Validate Password and Confirm Password match
    var password = form.querySelector('input[name="password"]');
    var confirmPassword = form.querySelector('input[name="confirmpassword"]');
    var passwordError = document.getElementById('password-error');
    if (password.value !== confirmPassword.value) {
        isValid = false;
        passwordError.textContent = 'Passwords do not match!';
    } else {
        passwordError.textContent = ''; // Clear error message if passwords match
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
</script>

<script>
document.getElementById('kt_sign_up_form').addEventListener('submit', function(event) {
    var form = event.target;
    if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
}, false);
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