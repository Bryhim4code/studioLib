   <!--begin::Navbar-->
   <div class="card mb-5 mb-xl-10">
       <div class="card-body pt-9 pb-0">
           <!--begin::Details-->
           <div class="d-flex flex-wrap flex-sm-nowrap">
               <!--begin: Pic-->
               <div class="me-7 mb-4">
                   <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                       <?php if (!empty($AdminData['photo']) && file_exists('uploads/profile/image/' . $AdminData['photo'])) : ?>
                       <img src="<?= base_url() . 'uploads/profile/image/' . $AdminData['photo'] ?>" alt="image" />
                       <?php else : ?>
                       <img src="<?= base_url() ?>assets/media/avatars/blank.png" alt="Temporary Image" />
                       <!-- Use the placeholder image here -->
                       <?php endif; ?>
                       <div
                           class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                       </div>
                   </div>
               </div>


               <!--end::Pic-->
               <!--begin::Info-->
               <div class="flex-grow-1">
                   <!--begin::Title-->
                   <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                       <!--begin::User-->
                       <div class="d-flex flex-column">
                           <!--begin::Name-->
                           <div class="d-flex align-items-center mb-2">
                               <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?= isset($AdminData['first_name']) ? $AdminData['first_name'] : "" ?>
                                   <?= isset($AdminData['last_name']) ? $AdminData['last_name'] : "" ?>

                               </a>
                               <a>
                                   <i class="ki-duotone ki-verify fs-1 text-primary">
                                       <span class="path1"></span>
                                       <span class="path2"></span>
                                   </i>
                               </a>
                           </div>
                           <!--end::Name-->
                           <!--begin::Info-->
                           <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                               <a class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                   <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                       <span class="path1"></span>
                                       <span class="path2"></span>
                                       <span class="path3"></span>
                                   </i>
                                   <?= isset($AdminData['role']) ? $AdminData['role'] : "" ?></a>
                               <?php if (!empty($AdminData['address'])) : ?>
                               <a class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                   <i class="ki-duotone ki-geolocation fs-4 me-1">
                                       <span class="path1"></span>
                                       <span class="path2"></span>
                                   </i>

                                   <?= isset($AdminData['address']) ? $AdminData['address'] : "" ?></a>
                               <?php endif; ?>


                               <a class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                   <i class="ki-duotone ki-sms fs-4">
                                       <span class="path1"></span>
                                       <span class="path2"></span>
                                   </i>
                                   <?= isset($AdminData['email']) ? $AdminData['email'] : "" ?></a>
                           </div>
                           <!--end::Info-->
                       </div>
                       <!--end::User-->
                       <!--begin::Actions-->
                       <div class="d-flex my-4">

                           <!--begin::Menu-->

                       </div>
                       <!--end::Actions-->
                   </div>
                   <!--end::Title-->
                   <!--begin::Stats-->
                   <div class="d-flex flex-wrap flex-stack">
                       <!--begin::Wrapper-->
                       <div class="d-flex flex-column flex-grow-1 pe-8">
                           <!--begin::Stats-->

                           <!--end::Stats-->
                       </div>
                       <!--end::Wrapper-->
                       <!--begin::Progress-->

                       <!--end::Progress-->
                   </div>
                   <!--end::Stats-->
               </div>
               <!--end::Info-->
           </div>
           <!--end::Details-->
           <!--begin::Navs-->
           <br>
           <br>



           <!--begin::Navs-->
       </div>
   </div>
   <!--end::Navbar-->