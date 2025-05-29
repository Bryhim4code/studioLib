<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->
<?php
if (isset($visitingData) && is_array($visitingData)) {
    $numberOfvisitingData = count($visitingData);
}
?>
<?php
if (isset($MaintenanceRequests) && is_array($MaintenanceRequests)) {
    $numberOfMaintenanceRequestsData = count($MaintenanceRequests);
}
?>
<?php
if (isset($AllTicketsData) && is_array($AllTicketsData)) {
    $numberOfAllTicketsData = count($AllTicketsData);
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

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"> Overview</h1>
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
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5"><?= isset($numberOfAllTicketsData) ? $numberOfAllTicketsData : '' ?></div>
                                            <div class="fw-semibold fs-2 text-white">Open Tickets</div>
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
                                            <i class="ki-duotone ki-briefcase text-white fs-2x ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5"><?= isset($numberOfMaintenanceRequestsData) ? $numberOfMaintenanceRequestsData : '' ?></div>
                                            <div class="fw-semibold fs-2 text-white">Pending Maintanance</div>
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
                                            <div class="text-white fw-bold fs-1 mb-2 mt-5"><?= isset($numberOfvisitingData) ? $numberOfvisitingData : '' ?></div>
                                            <div class="fw-semibold fs-2 text-white">Checked-in Visitors</div>
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
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">Open Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">Pending Maintanance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Checked-in Visitors</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
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
                                            <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search " />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                            <!--begin::Filter-->

                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                                <!--begin::Header-->

                                                <!--end::Header-->
                                                <!--begin::Separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Separator-->
                                                <!--begin::Content-->
                                                <!--  -->
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Filter-->

                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                                            <div class="fw-bold me-5">
                                                <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected
                                            </div>
                                            <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                                        </div>
                                        <!--end::Group actions-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                                <th class="min-w-70px">Ticket Id</th>
                                                <th class="min-w-70px">priority</th>
                                                <th class="min-w-70px">customer</th>
                                                <!-- <th class="min-w-70px">/phone</th> -->
                                                <th class="min-w-70px">assigned to </th>
                                                <th class="min-w-70px"> Status</th>
                                                <th class="min-w-80px">Cat ID</th>

                                                <th class="text-end min-w-70px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php if (isset($AllTicketsData) && is_array($AllTicketsData)) : ?>
                                                <?php foreach ($AllTicketsData as $data) : ?>
                                                    <tr>
                                                        <td><?= isset($data['ticket_id']) ? $data['ticket_id'] : '' ?></td>

                                                        <!-- <td>
                                                    <a href="" class="text-gray-800 text-hover-primary mb-1"></?= isset($data['ticket_id']) ? $data['ticket_id'] : '' ?></a>
                                                </td> -->

                                                        <!-- <td>
                                                    <a href="" class="text-gray-800 text-hover-primary mb-1"></?= isset($data['ticket_status']) ? $data['ticket_status'] : '' ?></a>
                                                </td> -->
                                                        <td>
                                                            <a class="badge 
        <?php
                                                    if (isset($data['priority'])) {
                                                        switch ($data['priority']) {
                                                            case 'HIGH':
                                                                echo 'badge-light';
                                                                break;
                                                            case 'LOW':
                                                                echo 'badge-light';
                                                                break;
                                                            case 'URGENT':
                                                                echo 'badge-light';
                                                                break;
                                                            case 'MEDIUM':
                                                                echo 'badge-light';
                                                                break;
                                                            default:
                                                                echo 'badge-info'; // Default to info for unknown priorities
                                                        }
                                                    } else {
                                                        echo 'badge-info'; // Default to info if priority is not set
                                                    }
        ?> mb-1">
                                                                <?= isset($data['priority']) ? $data['priority'] : '' ?>
                                                            </a>
                                                        </td>

                                                        <td><?= isset($data['customer']) ? $data['customer'] : '' ?></td>
                                                        <!-- <td></?= isset($data['customer_phone']) ? $data['customer_phone'] : '' ?></td> -->
                                                        <td>
                                                            <a href="" class="text-gray-800 text-hover-primary mb-1"><?= isset($data['assigned_to']) ? $data['assigned_to'] : '' ?></a>
                                                        </td>
                                                        <td>
                                                            <a class="badge 
        <?php
                                                    if (isset($data['ticket_status'])) {
                                                        switch ($data['ticket_status']) {
                                                            case 'OPEN':
                                                                echo 'badge-light-danger';
                                                                break;
                                                            case 'REOPENED':
                                                                echo 'badge-light-warning';
                                                                break;
                                                            case 'INPROGRESS':
                                                                echo 'badge-info';
                                                                break;
                                                            case 'CLOSED':
                                                                echo 'badge-success';
                                                                break;
                                                            case 'RESOLVED':
                                                                echo 'badge-success';
                                                                break;
                                                            default:
                                                                echo 'badge-info'; // Default to info for unknown priorities
                                                        }
                                                    } else {
                                                        echo 'badge-info'; // Default to info if priority is not set
                                                    }
        ?> mb-1">
                                                                <?= isset($data['ticket_status']) ? $data['ticket_status'] : '' ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="" class="text-primary text-hover-primary mb-1"><?= isset($data['ticket_category_id']) ? $data['ticket_category_id'] : '' ?></a>
                                                        </td>


                                                        <td class="text-end">
                                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <i class="ki-duotone ki-down fs-5 m-0"></i></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="<?= base_url() . 'ticketing/ticket/details/' . $data['id']  ?>" class="menu-link px-3">View</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <!-- <div class="menu-item px-3">
                                                            <a href="apps/subscriptions/add.html" class="menu-link px-3">Edit</a>
                                                        </div> -->
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <!-- <div class="menu-item px-3">
                                                            <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">Delete</a>
                                                        </div> -->
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
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
                                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Maintenance" />
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
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                                    <option></option>
                                                    <option value="all">All</option>
                                                    <option value="PENDING">PENDING</option>
                                                    <option value="EXECUTED">EXECUTED</option>
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
                                                <th class="min-w-125px"> Name</th>
                                                <th class="min-w-125px">Purpose</th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="min-w-125px">Requested By</th>
                                                <th class="min-w-125px">Requested Date</th>
                                                <th class="text-end min-w-70px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <?php if (isset($MaintenanceRequests) && is_array($MaintenanceRequests)) : ?>
                                                <?php foreach ($MaintenanceRequests as $data) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-800 text-hover-primary mb-1"><?= isset($data['customer_name']) ? $data['customer_name'] : '' ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="text-gray-600 text-hover-primary mb-1"><?= $data['purpose'] ?></a>
                                                        </td>
                                                        <td>
                                                            <!--begin::Badges-->
                                                            <div class="badge <?= isset($data['executed']) && $data['executed'] == 'PENDING' ? 'badge-light-danger' : 'badge-success' ?>">
                                                                <?= isset($data['executed']) ? $data['executed'] : '' ?>
                                                            </div>
                                                            <!--end::Badges-->
                                                        </td>
                                                        <td><?= isset($data['requested_by']) ? $data['requested_by'] : '' ?>
                                                        </td>
                                                        <td><?= isset($data['requested_on']) ? $data['requested_on'] : '' ?>
                                                        </td>
                                                        <td class="text-end">
                                                            <a class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="<?= base_url() . 'ticketing/maintenance/equipmentrequests/details/view/' . $data['id'] ?>" class="menu-link px-3">Details</a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="<?= base_url() . 'ticketing/maintenance/equipment-request/details/edit/' . $data['id'] ?>" class="menu-link px-3">Edit</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <!-- <a href="</?= base_url() . 'ticketing/maintenance/equipment-request/details/delete/' . $data['id'] ?>" onclick="confirmDelete(event)" data-kt-ecommerce-product-filter="delete_row" class=" menu-link px-3">Delete</a> -->
                                                                    <a href="<?= base_url() . 'ticketing/maintenance/equipment-request/details/delete/' . $data['id'] ?>" onclick="openDeleteModal(event)" class="menu-link px-3">Delete</a>
                                                                </div>
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
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
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
                                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-filter fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Filter</button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Separator-->
                                                <!--begin::Content-->
                                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                            <option></option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Checkedin">Checked In</option>
                                                            <option value="Checkedout">Checked Out</option>

                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Filter-->


                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                            <div class="fw-bold me-5">
                                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                            </div>
                                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                                        </div>
                                        <!--end::Group actions-->

                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-4">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-125px">Residents</th>
                                                <th class="min-w-125px">Code</th>
                                                <th class="min-w-125px">SCHD DATE </th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="min-w-125px">Vistor's Name</th>
                                                <th class="text-end min-w-100px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php if (isset($visitingData) && is_array($visitingData)) : ?>
                                                <?php foreach ($visitingData as $visitor) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a>
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger"><?= isset($visitor['resident_fullname']) ? strtoupper(substr($visitor['resident_fullname'], 0, 1)) : '' ?></div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::User details-->
                                                            <div class="d-flex flex-column">
                                                                <a class="text-gray-800 text-hover-primary mb-1"> <?= $visitor['resident_fullname'] ?></a>
                                                                <span><?= $visitor['phone'] ?></span>
                                                            </div>
                                                            <!--begin::User details-->
                                                        </td>
                                                        <td> <?= $visitor['codes'] ?></td>
                                                        <td>
                                                            <div class="badge badge-light fw-bold">

                                                                <?php
                                                                if (isset($visitor['when_created'])) {
                                                                    $createdDate = new DateTime($visitor['when_created']);
                                                                    $currentDate = new DateTime();

                                                                    $interval = $currentDate->diff($createdDate);
                                                                    $elapsed = $interval->format('%y years %m months %d days %h hours %i minutes %s seconds');

                                                                    if ($interval->y > 0) {
                                                                        $timeAgo = $interval->format('%y years ago');
                                                                    } elseif ($interval->m > 0) {
                                                                        $timeAgo = $interval->format('%m months ago');
                                                                    } elseif ($interval->d > 0) {
                                                                        $timeAgo = $interval->format('%d days ago');
                                                                    } elseif ($interval->h > 0) {
                                                                        $timeAgo = $interval->format('%h hours ago');
                                                                    } elseif ($interval->i > 0) {
                                                                        $timeAgo = $interval->format('%i minutes ago');
                                                                    } else {
                                                                        $timeAgo = 'Just now';
                                                                    }

                                                                    echo $timeAgo;
                                                                } else {
                                                                    echo ''; // Or any default value you want to display if $data['message_date'] is not set
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-light-danger fw-bold">
                                                                <?php if ($visitor['status'] == 'CHECKEDIN') : ?>
                                                                    Checked-in
                                                                <?php else : ?>
                                                                    <?= $visitor['status'] ?>
                                                                <?php endif; ?>
                                                            </div>

                                                        </td>
                                                        <td><?= $visitor['name_of_visitor'] ?></td>
                                                        <td class="text-end">
                                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="<?= base_url() . 'visitor/schedule/edit/' . $visitor['id'] ?>" class="menu-link px-3">Edit</a>
                                                                </div>

                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a onclick="openDeleteModal(event)" href="<?= base_url() . 'visitor/delete/student/scheduled/visit/' . $visitor['id'] ?>" class="menu-link px-3">Delete</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>


                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
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