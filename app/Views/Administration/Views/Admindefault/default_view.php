<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Iddocare Portal </title>
    <meta charset="utf-8" />
    <meta name="description" content="The premier School Facility Management System" />
    <meta name="keywords" content=" schools,school management, school facilities, Rooms, beds spaces, Facilities, facility, private hostel, lead city, ibadan, sign up" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content=" FacilityPro - The Premier Facility Management System by IddoCare" />
    <meta property="og:url" content="https://Iddocare.com" />
    <meta property="og:site_name" content="Portal for Iddocare.com" />
    <link rel="canonical" href="https://Iddocare.com" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/logo/iddocarelogo.png" /> <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="<?= base_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?= base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->


<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--begin::App-->
    <!-- <div class="app-page flex-column flex-column-fluid" id="kt_app_page"> -->
    <?= view(MODULE_ADMIN_VIEWS . '/template/_header_view') ?>
    <?= view(MODULE_ADMIN_VIEWS . '/template/leftsidebar') ?>
    <?= $this->renderSection('content') ?>
    <?= view(MODULE_ADMIN_VIEWS . '/template/_footer_view') ?>
    <?= view(MODULE_ADMIN_VIEWS . '/pre/deletemodal') ?>
    <?= view(MODULE_ADMIN_VIEWS . '/template/toast_view') ?>
    <!-- </div> -->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "<?= base_url() ?>assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="<?= base_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <!-- <script src="<.?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/products.js"></script> -->
    <script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/new-target.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>