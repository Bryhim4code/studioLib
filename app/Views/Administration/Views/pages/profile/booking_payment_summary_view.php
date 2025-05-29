<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->
<title> <?= $title ?> - Iddocare Portal</title>

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
                            Invoice 1</h1>
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
                            <li class="breadcrumb-item text-muted">Invoice Manager</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">View Invoices</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Invoice 2 main-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                    <!--begin::Invoice 2 content-->
                                    <div class="mt-n1">
                                        <!--begin::Top-->
                                        <div class="d-flex flex-stack pb-10">
                                            <!--begin::Logo-->
                                            <a>
                                                <img width="100px" alt="Logo"
                                                    src="<?= base_url() ?>assets/logo/iddocarelogo.png" />
                                            </a>
                                            <!--end::Logo-->
                                            <!--begin::Action-->
                                            <div class="d-flex">
                                                <div style="margin-right: 14px;" class="class">
                                                    <?php if (isset($BookingSummary['status']) && $BookingSummary['status'] == "PAID") : ?>

                                                        <?php if ($VerifiedPayment == 'Verified') : ?>
                                                            <a onclick="openDeleteModal(event)"
                                                                class="btn confirm-btn btn-sm btn-light">Fully Paid</a>
                                                        <?php else : ?>
                                                            <a href="<?= base_url() . 'admin/bookings/payment/verification/' . $BookingSummary['id'] ?>"
                                                                onclick="openDeleteModal(event)"
                                                                class=" btn confirm-btn btn-sm btn-light-success">Confirm
                                                                Payment</a>
                                                        <?php endif; ?>

                                                    <?php endif; ?>

                                                </div>
                                                <div style="margin-right: 14px;" class="class">
                                                    <?php if (isset($BookingSummary['status']) && $BookingSummary['status'] == "PENDING") : ?>
                                                        <a href="<?= base_url() . 'admin/bookings/backend-payment/' . $BookingSummary['id'] ?>"
                                                            onclick="openDeleteModal(event)"
                                                            class="btn confirm-btn btn-sm btn-light-danger">Backend
                                                            Payment</a>
                                                    <?php endif; ?>

                                                </div>
                                                <div style="margin-right: 14px;" class="class">
                                                    <?php if (isset($BookingSummary['room_status']) && $BookingSummary['room_status'] !== "CHECKEDIN") : ?>


                                                        <a href="<?= base_url() . 'admin/bookings/payment/summary/checkin/' . $BookingSummary['id'] ?>"
                                                            onclick="openDeleteModal(event)"
                                                            class="btn confirm-btn btn-sm btn-light-success">Mark As
                                                            Checked-in</a>


                                                    <?php endif; ?>

                                                </div>

                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Top-->
                                        <!--begin::Wrapper-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-5 text-primary mb-">
                                                <?= isset($BookingSummary['room_type']) ? $BookingSummary['room_type'] : '' ?>
                                                /
                                                <?= isset($BookingSummary['floor']) ? $BookingSummary['floor'] : '' ?> /
                                                <?= isset($BookingSummary['room_no']) ? $BookingSummary['room_no'] : '' ?>
                                            </div>
                                            <div class="fw-bold fs-3 text-gray-800 mb-8">
                                                #<?= isset($BookingSummary['booking_id']) ? $BookingSummary['booking_id'] : '' ?>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-5 mb-11">
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue Date:</div>
                                                    <!--end::Label-->
                                                    <!--end::Col-->
                                                    <div class="fw-bold fs-6 text-gray-800">
                                                        <?= isset($BookingSummary['booking_date']) ? date('d M Y', strtotime($BookingSummary['booking_date'])) : '' ?>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Col-->
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Due Date:</div>
                                                    <!--end::Label-->
                                                    <!--end::Info-->
                                                    <div
                                                        class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                        <span
                                                            class="pe-2"><?= isset($BookingSummary['room_expiration_date']) ? date('d M Y', strtotime($BookingSummary['room_expiration_date'])) : '' ?></span>
                                                        <span class="fs-7 text-danger d-flex align-items-center">
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row g-5 mb-12">
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
                                                    <!--end::Label-->
                                                    <!--end::Text-->
                                                    <div class="fw-bold fs-6 text-gray-800">
                                                        <?= isset($BookingSummary['room_type']) ? $BookingSummary['room_type'] : '' ?>
                                                    </div>
                                                    <!--end::Text-->
                                                    <!--end::Description-->
                                                    <div class="fw-semibold fs-6 text-gray-600">
                                                        <?= isset($BookingSummary['floor']) ? $BookingSummary['floor'] : '' ?>
                                                        /
                                                        <?= isset($BookingSummary['no_of_beds']) ? ($BookingSummary['no_of_beds'] == 1 ? $BookingSummary['no_of_beds'] . ' bed' : $BookingSummary['no_of_beds'] . ' beds') : '' ?>
                                                        /
                                                        <?= isset($BookingSummary['selected_bunk']) ? $BookingSummary['selected_bunk'] : '' ?>
                                                        <br>
                                                        <?= isset($BookingSummary['room_no']) ? $BookingSummary['room_no'] : '' ?>
                                                    </div>
                                                    <!--end::Description-->
                                                    <!--end::Text-->
                                                    <!--end::Description-->
                                                    <?php if (isset($BookingSummary['full_room']) && $BookingSummary['full_room']) : ?>
                                                        <div class="fw-semibold fs-6 text-gray-600">Full Room:
                                                            <?= isset($BookingSummary['full_room']) ? $BookingSummary['full_room'] : '' ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="mb-17" style="display: none;">
                                                            <!-- If $Ticketdetails['photo'] is not set, hide the entire block -->
                                                            <!-- This block will be hidden because display is set to none -->
                                                        </div>
                                                    <?php endif; ?>
                                                    <!--end::Description-->
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Col-->
                                                <!--end::Col-->
                                                <div class="col-sm-6">
                                                    <!--end::Label-->
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issued By:</div>
                                                    <!--end::Label-->
                                                    <!--end::Text-->
                                                    <div class="fw-bold fs-6 text-gray-800">
                                                        <?= isset($BookingSummary['student_name']) ? $BookingSummary['student_name'] : '' ?>
                                                    </div>
                                                    <!--end::Text-->
                                                    <!--end::Description-->
                                                    <div class="fw-semibold fs-7 text-gray-600">
                                                        <?= isset($BookingSummary['location_code']) ? $BookingSummary['location_code'] : '' ?>
                                                        <br>
                                                        <?= isset($BookingSummary['student_id']) ? $BookingSummary['student_id'] : '' ?>
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Content-->
                                            <div class="flex-grow-1">
                                                <!--begin::Table-->
                                                <div class="table-responsive border-bottom mb-9">
                                                    <table class="table mb-3">
                                                        <thead>
                                                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                                                <th class="min-w-175px pb-2">Description</th>
                                                                <!-- <th class="min-w-70px text-end pb-2">Hours</th>
                                                                <th class="min-w-80px text-end pb-2">Rate</th> -->
                                                                <th class="min-w-100px text-end pb-2">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center pt-6">

                                                                    <i
                                                                        class="fa fa-genderless text-danger fs-2 me-2"></i><?= isset($BookingSummary['room_type']) ? $BookingSummary['room_type'] : '' ?>
                                                                    /
                                                                    <?= isset($BookingSummary['no_of_beds']) ? ($BookingSummary['no_of_beds'] == 1 ? $BookingSummary['no_of_beds'] . ' bed' : $BookingSummary['no_of_beds'] . ' beds') : '' ?>

                                                                </td>
                                                                <!-- <td class="pt-6">80</td>
                                                                <td class="pt-6">$40.00</td> -->
                                                                <td class="pt-6 text-gray-900 fw-6">
                                                                    &#x20A6;<?= isset($BookingSummary['amount_due']) ? number_format($BookingSummary['amount_due'], 2) : '' ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center pt-6">

                                                                    <i
                                                                        class="fa fa-genderless text-danger fs-2 me-2"></i>
                                                                    Amount per bed space

                                                                </td>
                                                                <!-- <td class="pt-6">80</td>
                                                                <td class="pt-6">$40.00</td> -->
                                                                <td class="pt-6 text-gray-900 fw-6"> &#x20A6;
                                                                    <?= isset($BookingSummary['price']) ? number_format($BookingSummary['price'], 2) : '' ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                                <!--begin::Container-->
                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Section-->
                                                    <div class="mw-300px">
                                                        <!--begin::Item-->

                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack">
                                                            <!--begin::Code-->
                                                            <div class="fw-semibold pe-10  text-gray-900 fs-4">Total :
                                                            </div>
                                                            <!--end::Code-->
                                                            <!--begin::Label-->
                                                            <div class="text-end fw-bold fs-6 text-gray-800">
                                                                &#x20A6;<?= isset($BookingSummary['amount_due']) ? number_format($BookingSummary['amount_due'], 2) : '' ?>
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Container-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Invoice 2 content-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Sidebar-->
                                <!--  -->
                                <!--end::Sidebar-->
                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!-- <br>
                    <br>
                    <div class="d-flex justify-content-start">
                        <a onclick="goBack()" id="kt_ecommerce_add_product_cancel" class="btn btn-primary me-5">Go Back</a>
                    </div> -->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->

    <!-- Modal for Confirmation -->
    <div class="modal fade" tabindex="-1" id="deleteModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="proceedWithDelete()">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?> ?>

<script>
    function openDeleteModal(event) {
        event.preventDefault(); // Prevent the default action (following the link)
        var deleteUrl = event.target.href;
        $('#deleteModal').modal('show');

        // Set delete URL to the "Delete" button in the modal
        $('#deleteModal .btn-danger').attr('onclick', 'proceedWithDelete("' + deleteUrl + '")');
    }

    function proceedWithDelete(deleteUrl) {
        if (deleteUrl) {
            // If user confirms, proceed with the delete action
            window.location = deleteUrl;
        } else {
            console.error("Delete URL is not provided.");
        }
    }
</script>



<?= $this->endSection() ?>