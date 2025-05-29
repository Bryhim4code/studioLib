<style>
  .user-badge {
    border-radius: 9999px;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    border: 1px solid #e5e7eb;
    background-color: #fff;
    transition: box-shadow 0.2s;
  }

  .artist-label {
    color: #a855f7;
    font-weight: bold;
    font-size: 0.75rem;
    margin-top: -4px;
  }

  .dropdown-toggle::after {
    display: none;
  }



.dropdown-menu{
  border: none;
  padding: 10px;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-item {

  /* background-color: #f1f1f1; */
  min-width: 180px;
  padding: 10px;
  border: none;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-item a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-item li:hover {
  background-color: #a855f7 !important;
  color: white !important;}

</style>

<section>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top ">
    <div class="container"><a class="navbar-brand" href="<?= base_url() ?>"><img class="img-fluid"
          src="images/studiolib-logo.png" alt="Studio Lib official logo white" /></a>
      <div class="collapse navbar-collapse position-absolute top-50 start-50 translate-middle">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>studio-libraries">Studio Libraries</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>about-us">About</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>how-it-works">How it works </a></li>
        </ul>
      </div>
      <?php if (session()->has('user_id')): ?>
        <?php $user_role = session()->get(key: 'user_role'); ?>
        <!-- <div class="d-none d-lg-flex align-items-center">
          <a style="background-color: #F8F8F8; color: 000; border-radius: 50px;" class=" btn btn-light  me-3 fw-medium " href="<?= base_url() ?>logout">Logout</a>
          <a class="btn btn-purple fw-medium" href="<?= base_url() ?>dashboard">Dashboard</a>
        </div> -->
        <div class="dropdown">
          <div class="user-badge dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="rounded-circle bg-secondary" style="width: 42px; height: 42px;"></div>
            <div class="d-flex flex-column">
              <span class="fw-medium text-dark"> <?php echo   $username = session()->get(key: 'username'); ?></span>
              <span class="artist-label">ARTIST</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chevron-down ms-1" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
          <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm p-2" aria-labelledby="dropdownMenuButton1">
            <li class="rounded-3"><a class="dropdown-item" href="<?= base_url() ?>dashboard"> Profile</a></li>
            <!-- <li class="d-flex justify-content-around align-items-center"> <i class="bi bi-gear p-1"></i> <a class="dropdown-item" href="<?= base_url() ?>settings">Settings</a></li> -->
            <li class="rounded-3"><a class="dropdown-item" href="<?= base_url() ?>logout">Logout</a></li>
          </ul>
        </div>
      <?php else: ?>
        <div class="d-none d-lg-flex align-items-center">
          <a style="background-color: #F8F8F8; color: 000; border-radius: 50px;"
            class="btn signup btn-light me-3" href="<?= base_url() ?>signup">Sign Up</a>
          <a
            class="btn signin btn-purple" href="<?= base_url() ?>auth">Sign in</a>

        </div>
      <?php endif; ?>


      <div class="d-lg-none">
        <button class="btn navbar-burger p-0">
          <svg class="text-purple" width="51" height="51" viewbox="0 0 56 56" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect width="56" height="56" rx="28" fill="currentColor"></rect>
            <path d="M37 32H19M37 24H19" stroke="white" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
          </svg>
        </button>
      </div>
    </div>
  </nav>
  <div class="d-none navbar-menu position-fixed top-0 start-0 bottom-0 w-75 mw-xs" style="z-index: 9999;">
    <div class="navbar-close navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-dark"
      style="opacity: 75%;"></div>
    <nav
      class="position-relative h-100 w-100 d-flex flex-column justify-content-between py-8 px-8 bg-white overflow-auto">
      <div class="d-flex align-items-center"><a class="me-auto h4 mb-0 text-decoration-none" href="<?= base_url() ?>"><img class="img-fluid"
            src="images/studiolib-logo.png" alt="Studio Lib official logo white" /></a></div>
      <div class="py-16">
        <ul class="nav flex-column">
          <li class="nav-item mb-8"><a class="nav-link text-purple" href="<?= base_url() ?>">Home</a></li>
          <li class="nav-item mb-8"><a class="nav-link text-purple" href="<?= base_url() ?>studio-libraries">Studio Libraries</a></li>
          <li class="nav-item mb-8"><a class="nav-link text-purple" href="<?= base_url() ?>about-us">About</a></li>
          <li class="nav-item"><a class="nav-link text-purple" href="<?= base_url() ?>how-it-works">How it works</a></li>
        </ul>
      </div>
      <?php if (session()->has('user_id')): ?>
        <?php $user_role = session()->get(key: 'user_role'); ?>
        <div class="d-flex flex-column">
          <a class="btn btn-purple w-100 fw-medium mb-3" href="<?= base_url() ?>auth/logout">Logout</a>
          <a class="btn btn-purple-outline w-100 fw-medium" href="<?= base_url() ?><?= $user_role ?>/profiledash">Profile</a>
        </div>
      <?php else: ?>
        <div><a class="btn btn-purple w-100 fw-medium" href="<?= base_url() ?>auth">Login</a>
          <a class="btn w-100 btn-purple-outline mt-3" href="<?= base_url() ?>auth">Sign in</a>
        </div>
      <?php endif; ?>
    </nav>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
