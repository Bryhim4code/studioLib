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
                            Users List</h1>
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
                            <li class="breadcrumb-item text-muted"> Users List</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <a style="margin-left: 20px;" href="<?= base_url() ?>admin/create-users"> <button
                            class="btn btn-primary"> Create Users</button></a>

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

                    <!--end::Hero body-->
                    <!-- </div> -->
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->

                            <div class="card-title ">
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
                                        <th class="min-w-130px"> First Name</th>
                                        <th class="min-w-125px">Last Name</th>
                                        <th class="min-w-60px">Role</th>
                                        <th class="min-w-135px">email </th>
                                        <th class="min-w-100px">Phone</th>
                                        <th class="min-w-100px">Status</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <?php if (isset($Userlist) && is_array($Userlist)) : ?>
                                        <?php foreach ($Userlist as $data) : ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="text-gray-800 text-hover-primary mb-1"><?= isset($data['first_name']) ? $data['first_name'] : '' ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a
                                                        class="text-gray-600 text-hover-primary mb-1"><?= isset($data['last_name']) ? $data['last_name'] : '' ?></a>
                                                </td>
                                                <td>
                                                    <a
                                                        class="text-gray-600 text-hover-primary mb-1"><?= isset($data['role']) ? $data['role'] : '' ?></a>
                                                </td>

                                                <td><?= isset($data['email']) ? $data['email'] : '' ?>
                                                </td>
                                                <td><?= isset($data['phone']) ? $data['phone'] : '' ?>
                                                </td>
                                                <td>
                                                    <!--begin::Badges-->
                                                    <div
                                                        class="badge <?= isset($data['status']) && $data['status'] == 'INACTIVE' ? 'badge-light-danger' : 'badge-success' ?>">
                                                        <?php
                                                        // Check if room_status is CHECKEDIN or NOTIN and display accordingly
                                                        if (isset($data['status'])) {
                                                            if ($data['status'] == 'ACTIVE') {
                                                                echo 'User Is Active';
                                                            } elseif ($data['status'] == 'INACTIVE') {
                                                                echo 'Not Active ';
                                                            } else {
                                                                echo $data['status'];
                                                            }
                                                        }
                                                        ?>
                                                    </div>

                                                    <!--end::Badges-->
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
                                                            <a href="<?= base_url() . 'admin/user/activation/' . $data['id'] ?>"
                                                                class="menu-link px-3">Activate User</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="<?= base_url() . 'admin/user/deactivation/' . $data['id'] ?>"
                                                                class="menu-link px-3">Deactivate </a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="<?= base_url() . 'admin/user/details/' . $data['id'] ?>"
                                                                class="menu-link px-3"> User Details</a>
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