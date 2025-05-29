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
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Code Check</h1>
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
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->

                <!--end::Toolbar-->
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container container-xxl">

                        <!-- </div> -->
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search " />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                        <div class="fw-bold me-5">
                                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                        </div>
                                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                    </div>
                                    <!--end::Group actions-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-40px">ID</th>
                                                <th class="min-w-70px">Student ID</th>
                                                <th class="min-w-180px">Name</th>
                                                <th class="min-w-180px">bedspace</th>
                                                <th class="min-w-180px">Amount</th>
                                                <th class="min-w-140px">Code</th>
                                                <th class="min-w-100px">Created</th>
                                                <th class="text-end min-w-70px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <?php if (isset($codes) && is_array($codes)) : ?>
                                                <?php foreach ($codes  as $data) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-800 text-hover-primary mb-1"><?= isset($data['id']) ? $data['id'] : '' ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-800 text-hover-primary mb-1"><?= isset($data['student_id']) ? $data['student_id'] : '' ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= isset($data['first_name']) ? $data['first_name'] : '' ?> <?= isset($data['last_name']) ? $data['last_name'] : '' ?></a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= isset($data['no_of_bedspace']) ? $data['no_of_bedspace'] : '' ?></a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= isset($data['total_amount']) ? $data['total_amount'] : '' ?></a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= isset($data['code']) ? $data['code'] : '' ?></a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= isset($data['created_at']) ? $data['created_at'] : '' ?></a>
                                                        </td>


                                                        <td class="text-end">
                                                            <a class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            <div class="menu-item px-3">
    <?php
        $status = $data['status'];
        $actionUrl = base_url('admin/payment/status/' . $data['id']);
        $actionLabel = ($status == 'PAID') ? 'Mark Pending' : 'Mark Paid';
    ?>
   <a 
    href="#" 
    class="menu-link px-3 trigger-confirm-modal" 
    data-action-url="<?= $actionUrl ?>" 
    data-action-label="<?= $actionLabel ?>"
    data-bs-toggle="modal" 
    data-bs-target="#confirmModal"
>
    <?= strtoupper($actionLabel) ?>
</a>

</div>
                                                               
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Content wrapper-->

            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmModalMessage">Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmModalProceedBtn">Yes, proceed</button>
            </div>
        </div>
    </div>
</div>


<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let actionUrl = ''; // To store the URL temporarily

    // Trigger button
    document.querySelectorAll('.trigger-confirm-modal').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            actionUrl = this.getAttribute('data-action-url');
            const actionLabel = this.getAttribute('data-action-label');

            // Update modal content dynamically
            document.getElementById('confirmModalLabel').textContent = `Confirm ${actionLabel}`;
            document.getElementById('confirmModalMessage').textContent = `Are you sure you want to ${actionLabel.toLowerCase()}?`;
        });
    });

    // Modal confirm button
    document.getElementById('confirmModalProceedBtn').addEventListener('click', function () {
        if (actionUrl) {
            window.location.href = actionUrl;
        }
    });
});
</script>

<!--<script>-->
<!--document.addEventListener('DOMContentLoaded', function () {-->
<!--    const actionBtn = document.getElementById('confirmActionBtn');-->

<!--    actionBtn.addEventListener('click', function (e) {-->
        <!--e.preventDefault(); // Prevent immediate navigation-->

<!--        const url = this.getAttribute('data-action-url');-->
<!--        const actionLabel = this.getAttribute('data-action-label');-->

<!--        Swal.fire({-->
<!--            title: 'Are you sure?',-->
<!--            text: `Do you really want to ${actionLabel.toLowerCase()}?`,-->
<!--            icon: 'warning',-->
<!--            showCancelButton: true,-->
<!--            confirmButtonText: 'Yes, proceed',-->
<!--            cancelButtonText: 'Cancel'-->
<!--        }).then((result) => {-->
<!--            if (result.isConfirmed) {-->
<!--                window.location.href = url;-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--});-->
<!--</script>-->

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