<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->

<?php
if (isset($StudentsIN) && is_array($StudentsIN)) {
    $numberOfStudentsIN = count($StudentsIN);
}
?>

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

                    <div class="page-title  justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        

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
                            <li class="breadcrumb-item text-muted">Overview</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                        
                    </div>
                    <!--end::Page title-->
                    <div style="margin-left: 700px;" class="page-title d-flex  justify-content-between  justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <div></div>
                        <div >
                        <a href="<?= base_url();?>admin/all-booking-sessions"><button class="btn btn-bg-primary text-light  ">View All Bookings </button></a>
                        </div>

                    </div>
                    <br>
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">

                    <!-- <div id="kt_app_content_container" class="app-container container-xxl"> -->
                    <!--begin::Hero card-->
                    <div class="card mb-6">
                        <!--begin::Hero body-->
                        <div class="card-body ">

                            <!--end::Hero content-->
                            <!--begin::Hero nav-->
                            <!-- <div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5"> -->
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-12">

                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <i class="ki-duotone ki-cheque text-white fs-2x ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                            </i>
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5">24</div>
                                            <div class="fw-semibold fs-2 text-white">Rooms in Total</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <i class="ki-duotone ki-book text-white fs-2x ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5">
                                                <?php if (isset($noOfBedsBooked)): ?>
                                                    <p>
                                                        <?= $noOfBedsBooked; ?> / 49</p>
                                                <?php else: ?>
                                                    <p>No beds booked with status "paid".</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="fw-semibold fs-2 text-white">Bed Spaces Booked</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <i class="ki-duotone ki-chart-pie-simple text-white fs-2x ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5">
                                                <?= isset($numberOfStudentsIN) ? $numberOfStudentsIN : '' ?></div>
                                            <div class="fw-semibold fs-2 text-white">Checked-in </div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                            </div>
                            <!--begin::Nav-->

                            <!--end::Nav-->
                            <!--begin::Action-->
                            <!--end::Action-->
                        </div>
                        <!--end::Hero nav-->
                    </div>
                    <!--end::Hero body-->
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
                                    <input type="text" data-kt-customer-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search " />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <div class="w-150px me-3">
                                        <!--begin::Select2-->
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-hide-search="true" data-placeholder="Status"
                                            data-kt-ecommerce-order-filter="status">
                                            <option></option>
                                            <option value="all">All</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="PAID">Paid</option>
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                    <!--end::Filter-->
                                    <!--begin::Export-->
                                    <!-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                                        <i class="ki-duotone ki-exit-up fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Export</button> -->
                                    <!--end::Export-->
                                    <!--begin::Add customer-->
                                    <!-- <a href="<?= base_url() ?>ticketing/maintenance/equipment-request"> <button type="button" class="btn btn-primary">Maintenance Equipment Request</button></a> -->
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-customer-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2"
                                            data-kt-customer-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                        data-kt-customer-table-select="delete_selected">Delete Selected</button>
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
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_customers_table .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-130px"> Name</th>
                                        <th class="min-w-125px">booking id</th>
                                        <th class="min-w-60px">Status</th>
                                        <th class="min-w-135px">Room Type </th>
                                        <th class="min-w-80px">Room no </th>
                                        <th class="min-w-100px"> Date</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <?php if (isset($Bookings) && is_array($Bookings)) : ?>
                                        <?php foreach ($Bookings as $data) : ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="text-gray-800 text-hover-primary mb-1"><?= isset($data['student_name']) ? $data['student_name'] : '' ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a
                                                        class="text-gray-600 text-hover-primary mb-1"><?= $data['booking_id'] ?></a>
                                                </td>
                                                <td>
                                                    <!--begin::Badges-->
                                                    <div
                                                        class="badge <?= isset($data['status']) && $data['status'] == 'PENDING' ? 'badge-light-danger' : 'badge-success' ?>">
                                                        <?= isset($data['status']) ? $data['status'] : '' ?>
                                                    </div>
                                                    <!--end::Badges-->
                                                </td>
                                                <td><?= isset($data['room_type']) ? $data['room_type'] : '' ?>
                                                </td>
                                                <td><?= isset($data['room_no']) ? $data['room_no'] : '' ?>
                                                </td>
                                                <td><?= isset($data['booking_date']) ? $data['booking_date'] : '' ?>
                                                </td>
                                                <td class="text-end">
                                                    <a class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="<?= base_url() . 'admin/bookings/payment/summary/' . $data['id'] ?>"
                                                                class="menu-link px-3">Details</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->

                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
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
                    <!--end::Card-->
                    <!--begin::details View-->
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