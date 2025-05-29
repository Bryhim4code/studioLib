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
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Create Announcement</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted"></li>
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
                    <!--begin::Contacts App- Edit Contact-->
                    <div class="row g-7">
                        <!--begin::Contact groups-->


                        <!--begin::Content-->
                        <div class="col-xl-12">
                            <!--begin::Contacts-->
                            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                                <!--begin::Card header-->
                                <div class="card-header pt-7" id="kt_chat_contacts_header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <i class="ki-duotone ki-badge fs-1 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        <h2>Announcements</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-5">
                                    <!--begin::Form-->
                                    <form id="kt_ecommerce_settings_general_form" class="form" action="<?= base_url() . (isset($mode) && $mode === 'edit' ? 'admin/announcements/edit/' . $Id : 'admin/announcements/create') ?>" method="post">
                                        <!-- Title -->
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Title</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter the title">
                                                    <i class="ki-duotone ki-information fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="title" value="<?= isset($announcement['title']) ? $announcement['title'] : '' ?>" required />
                                            <div class="error-message text-danger" id="title-error"></div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                            <div class="col">
                                                <div class="fv-row mb-7">
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Start Date</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="">
                                                            <i class="ki-duotone ki-information fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <input type="date" class="form-control form-control-solid" name="start_date" value="<?= isset($announcement['start_date']) ? $announcement['start_date'] : '' ?>" required />
                                                    <div class="error-message text-danger" id="start-date-error"></div>
                                                </div>
                                            </div>

                                            <!-- End Date -->
                                            <div class="col">
                                                <div class="fv-row mb-7">
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">End Date</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="">
                                                            <i class="ki-duotone ki-information fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <input type="date" class="form-control form-control-solid" name="end_date" value="<?= isset($announcement['end_date']) ? $announcement['end_date'] : '' ?>" required />
                                                    <div class="error-message text-danger" id="end-date-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Notes</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Enter any additional notes about the contact (optional).">
                                                    <i class="ki-duotone ki-information fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <textarea class="form-control form-control-solid" name="message" required><?= isset($announcement['message']) ? $announcement['message'] : '' ?></textarea>
                                            <div class="error-message text-danger" id="message-error"></div>
                                        </div>

                                        <!-- Action buttons -->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Save</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                    </form>


                                    <!--end::Form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Contacts App- Edit Contact-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>

    </div>
    <!--end:::Main-->
</div>
<!--end:::Main-->
</div>

<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?>
<script>
    document.getElementById('kt_ecommerce_settings_general_form').addEventListener('submit', function(event) {
        let isValid = true;

        const title = document.getElementsByName('title')[0];
        const startDate = document.getElementsByName('start_date')[0];
        const endDate = document.getElementsByName('end_date')[0];
        const message = document.getElementsByName('message')[0];

        // Clear previous error messages
        document.getElementById('title-error').textContent = '';
        document.getElementById('start-date-error').textContent = '';
        document.getElementById('end-date-error').textContent = '';
        document.getElementById('message-error').textContent = '';

        // Validate Title
        if (!title.value) {
            isValid = false;
            document.getElementById('title-error').textContent = 'Title is required.';
        }

        // Validate Start Date
        if (!startDate.value) {
            isValid = false;
            document.getElementById('start-date-error').textContent = 'Start date is required.';
        }

        // Validate End Date
        if (!endDate.value) {
            isValid = false;
            document.getElementById('end-date-error').textContent = 'End date is required.';
        }

        // Validate Message
        if (!message.value) {
            isValid = false;
            document.getElementById('message-error').textContent = 'Message is required.';
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
        }
    });
</script>


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