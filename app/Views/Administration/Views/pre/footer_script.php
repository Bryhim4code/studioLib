<script>
    var hostUrl = "<?= base_url() ?>assets/";
</script>
<script src="<?= base_url() ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="<?= base_url() ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?= base_url() ?>assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/user-management/users/list/export-users.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/support-center/tickets/create.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/support-center/general.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/categories.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/save-category.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/customers/listing/listing.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/customers/listing/add.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/customers/listing/export.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/sales/save-order.js"></script>
<script src="<?= base_url() ?>assets/js/custom/pages/user-profile/general.js"></script>
<script src="<?= base_url() ?>assets/js/custom/account/api-keys/api-keys.js"></script>
<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>

<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/subscriptions/list/export.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/subscriptions/list/list.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
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

    // dragger

    // Make the DIV element draggable:
    var element = document.querySelector('#kt_modal_3');
    dragElement(element);

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (elmnt.querySelector('.modal-content')) {
            // if present, the header is where you move the DIV from:
            elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;
        } else {
            // otherwise, move the DIV from anywhere inside the DIV:
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>