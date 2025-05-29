<!--begin::Main-->
<?= $this->extend(MODULE_ADMIN_VIEWS . '/Admindefault/default_view') ?>
<?= $this->section('content') ?>

<!--end::Header-->
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
                            View resident</h1>
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
                            <li class="breadcrumb-item text-muted">Contacts</li>
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
                    <!--begin::Contacts App-View resident-->
                    <div class="row g-7">
                        <!--begin::Search-->
                        <div class="col-lg-6 col-xl-4">
                            <!--begin::Contacts-->
                            <div class="card card-flush" id="kt_contacts_list">
                                <!--begin::Card header-->
                                <div class="card-header pt-7" id="kt_contacts_list_header">
                                    <!--begin::Form-->
                                    <form class="d-flex align-items-center position-relative w-100 m-0"
                                        autocomplete="off">
                                        <!--begin::Icon-->
                                        <i
                                            class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid ps-13" name="search"
                                            value="" placeholder="Search contacts" />
                                        <!--end::Input-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-5" id="kt_contacts_list_body">
                                    <!--begin::List-->
                                    <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                                        data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                                        data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                                        data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main"
                                        data-kt-scroll-offset="5px">
                                        <!--begin::User-->
                                        <!--begin::User-->
                                        <?php if (isset($relationData) && is_array($relationData)) : ?>
                                            <?php foreach ($relationData as $data) : ?>
                                                <!--begin::User-->
                                                <div class="d-flex flex-stack py-4">
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-40px symbol-circle">
                                                            <span
                                                                class="symbol-label bg-light-danger text-danger fs-6 fw-bolder"><?= isset($data['name']) ? strtoupper(substr($data['name'], 0, 1)) : '' ?></span>
                                                            <div
                                                                class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                                            </div>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Details-->
                                                        <div class="ms-4">
                                                            <a href="<?= base_url() . 'profile/student/relations/edit/' . $data['id'] ?>"
                                                                class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2"><?= $data['name'] ?></a>
                                                            <div class="fw-semibold fs-7 text-muted">
                                                                <a class="fs-6 fw-bol mb-2">Email:
                                                                </a>
                                                                <?= $data['email'] ?>
                                                            </div>
                                                            <div class="fw-semibold fs-7 text-muted"><a
                                                                    class="fs-6 fw-bol mb-2">Phone:
                                                                </a><?= $data['phone'] ?>
                                                            </div>
                                                            <div class="fw-semibold fs-7 text-muted"> <a
                                                                    class="fs-6 fw-bol mb-2">Address:
                                                                </a><?= $data['address'] ?>
                                                            </div>
                                                            <div class="fw-semibold fs-7 text-muted"><a
                                                                    class="fs-6 fw-bol mb-2">Relation:
                                                                </a><?= $data['relationship'] ?>
                                                            </div>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed d-none"></div>
                                                <!--end::Separator-->
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <!--end::User-->

                                        <!--end::User-->
                                    </div>
                                    <!--end::List-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Search-->
                        <!--begin::Content-->
                        <div class="col-xl-8">
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
                                        <h2>Contact Details</h2>
                                    </div>
                                    <!--end::Card title-->

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-5">
                                    <!--begin::Profile-->
                                    <div class="d-flex gap-7 align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-circle symbol-100px">
                                            <?php if (!empty($Residentsdata['photo']) && file_exists('uploads/profile/image/' . $Residentsdata['photo'])) : ?>
                                                <img src="<?= base_url() . 'uploads/profile/image/' . $Residentsdata['photo'] ?>"
                                                    alt="image" />
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>assets/media/avatars/blank.png"
                                                    alt="Temporary Image" /> <!-- Use the placeholder image here -->
                                            <?php endif; ?>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Contact details-->
                                        <div class="d-flex flex-column gap-2">
                                            <div class="d-flex  justify-content-between">
                                                <!--begin::Name-->
                                                <h3 class="mb-0"><?= $Residentsdata['first_name'] ?>
                                                    <?= $Residentsdata['last_name'] ?></h3>
                                                <!-- <button style="margin-left: 200px;" class='btn btn-dark text-light'><a class="text-white" href="<?= base_url() . 'admin/residents/kyc-status/' . $Residentsdata['id'] ?>">
                                                        </?= ($Residentsdata['kyc_status'] == 'DENIED') ? 'Approve Registration' : 'Block Registration' ?>
                                                    </a>
                                                </button> -->
                                                <button
                                                    style="margin-left: 200px;"
                                                    class="btn btn-dark text-light"
                                                    id="confirmActionBtn"
                                                    data-action-url="<?= base_url() . 'admin/residents/kyc-status/' . $Residentsdata['id'] ?>"
                                                    data-action-label="<?= ($Residentsdata['kyc_status'] == 'DENIED') ? 'Approve Registration' : 'Block Registration' ?>">
                                                    <?= ($Residentsdata['kyc_status'] == 'DENIED') ? 'Approve Registration' : 'Block Registration' ?>
                                                </button>

                                                <!--end::Name-->
                                            </div>
                                            <!--begin::Email-->
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ki-duotone ki-sms fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <a
                                                    class="text-muted text-hover-primary"><?= $Residentsdata['email'] ?></a>
                                            </div>
                                            <!--end::Email-->
                                            <!--begin::Phone-->
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ki-duotone ki-phone fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <a
                                                    class="text-muted text-hover-primary"><?= $Residentsdata['phone'] ?></a>
                                            </div>
                                            <!--end::Phone-->
                                        </div>
                                        <!--end::Contact details-->
                                    </div>
                                    <!--end::Profile-->
                                    <!--begin:::Tabs-->
                                    <ul
                                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2">
                                        <!--begin:::Tab item-->
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary d-flex align-items-center pb-4 active"
                                                data-bs-toggle="tab" href="#kt_contact_view_general">
                                                <i class="ki-duotone ki-home fs-4 me-1"></i>General</a>
                                        </li>
                                        <!--end:::Tab item-->
                                        <!--begin:::Tab item-->
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary d-flex align-items-center pb-4"
                                                data-bs-toggle="tab" href="#kt_contact_view_meetings">
                                                <i class="ki-duotone ki-calendar-8 fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>Booking Details</a>
                                        </li>
                                        <!--end:::Tab item-->
                                        <!--begin:::Tab item-->
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary d-flex align-items-center pb-4"
                                                data-bs-toggle="tab" href="#kt_contact_view_activity">
                                                <i class="ki-duotone ki-save-2 fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Lead City ID Card</a>
                                        </li>
                                        <!--end:::Tab item-->
                                    </ul>
                                    <!--end:::Tabs-->
                                    <!--begin::Tab content-->
                                    <div class="tab-content" id="">
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade show active" id="kt_contact_view_general"
                                            role="tabpanel">
                                            <!--begin::Additional details-->
                                            <div class="d-flex flex-column gap-5 mt-7">
                                                <!--begin::Company name-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">School Name</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['school'] ?></div>
                                                </div>
                                                <!--end::Company name-->
                                                <!--begin::City-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Address</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['address'] ?></div>
                                                </div>
                                                <!--end::City-->
                                                <!--begin::Country-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Country</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['country'] ?></div>
                                                </div>
                                                <!--end::Country-->
                                                <!--begin::Notes-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Date Of Birth</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['dob'] ?></div>
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Course</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['course'] ?></div>
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Level</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['level'] ?></div>
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">NIN</div>
                                                    <div class="fw-bold fs-5"><?= $Residentsdata['nin_number'] ?></div>
                                                </div>
                                                <!--end::Notes-->
                                            </div>
                                            <!--end::Additional details-->
                                        </div>
                                        <!--end:::Tab pane-->
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">
                                            <div class="d-flex flex-column gap-5 mt-7">
                                                <!--begin::Company name-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Room Number</div>
                                                    <div class="fw-bold fs-5">
                                                        <?= isset($bookingDetails[0]['room_no']) ? $bookingDetails[0]['room_no'] : ""  ?>
                                                    </div>
                                                </div>
                                                <!--end::Company name-->
                                                <!--begin::City-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Room Type</div>
                                                    <div class="fw-bold fs-5">
                                                        <?= isset($bookingDetails[0]['room_type']) ? $bookingDetails[0]['room_type'] : ""  ?>
                                                    </div>
                                                </div>
                                                <!--end::City-->
                                                <!--begin::Country-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Selected Bunk</div>
                                                    <div class="fw-bold fs-5">
                                                        <?= isset($bookingDetails[0]['selected_bunk']) ? $bookingDetails[0]['selected_bunk'] : ""  ?>
                                                    </div>
                                                </div>
                                                <!--end::Country-->
                                                <!--begin::Notes-->
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Number Of Beds</div>
                                                    <div class="fw-bold fs-5">
                                                        <?= isset($bookingDetails[0]['no_of_beds']) ? $bookingDetails[0]['no_of_beds'] : ""  ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Floor</div>
                                                    <div class="fw-bold fs-5">
                                                        <?= isset($bookingDetails[0]['floor']) ? $bookingDetails[0]['floor'] : ""  ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fw-bold text-muted">Payment Status</div>
                                                    <span style="width:100px"
                                                        class="badge badge-success fw-bold fs-5"><?= isset($bookingDetails[0]['status']) ? $bookingDetails[0]['status'] : ""  ?></span>
                                                </div>
                                                <!--end::Notes-->
                                            </div>
                                            <!--end::Tab Content-->
                                        </div>
                                        <!--end:::Tab pane-->
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">

                                            <div class="row g-10">
                                                <!--begin::Col-->
                                                <div class="col-md-12">
                                                    <!--begin::Hot sales post-->
                                                    <div class="card-xl-stretch ms-md-6">
                                                        <!--begin::Overlay-->

                                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                                            href="<?= base_url() .  'uploads/profile/studentid/' . $Residentsdata['govt_id'] ?>">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                                style="background-image:url('<?= base_url() .  'uploads/profile/studentid/' . $Residentsdata['govt_id'] ?>')">
                                                            </div>

                                                            <!--end::Image-->
                                                            <!--begin::Action-->
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                <i class="ki-duotone ki-eye fs-2x text-white">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                    </div>



                                                    <!--end::Hot sales post-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--begin::Timeline-->

                                            <!--end::Timeline-->
                                        </div>
                                        <!--end:::Tab pane-->
                                    </div>
                                    <!--end::Tab content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Contacts App-View resident-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->

        <!--end::Footer-->
    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper-->
<?= view(MODULE_ADMIN_VIEWS . '/pre/footer_script') ?>
<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const actionBtn = document.getElementById('confirmActionBtn');

    actionBtn.addEventListener('click', function () {
        const url = this.getAttribute('data-action-url');
        const actionLabel = this.getAttribute('data-action-label');

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you really want to ${actionLabel.toLowerCase()}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/apps/contacts/view-contact.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>

<!--end::Custom Javascript-->
<!--end::Javascript-->
<?= $this->endSection() ?>