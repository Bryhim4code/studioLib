<html lang="en">

<?= view('/templates/head') ?>

<body>
  <div>
    <div>
      <div>
        <div>
          <div>
            <?= view('/templates/header_view') ?>
            <section class="mt-28 p-2">
              <div class="">
                <div class="row align-items-center mx-auto">
                  <div class="col-12 col-md-6 mb-14 mb-md-0">
                    <div class="mw-md mx-auto">
                      <h2 style="font-weight: 700; font-size: 4rem; width: 400px;" class="font-heading mb-6">Find
                        Studios, Fuel
                        Your <br>Creativity!</h2>
                      <p class="ms-2  fw-bold text-muted ">Find and book a studio session with your favorite
                        recording studios. <span id="spin" class="ms-1 text-purple fs-7 fw-medium"> Search our library today!</span>
                      </p>
                      <div class="d-flex align-items-center gap-3">
                        <!-- Search input -->
                        <div class="input-group rounded-pill search px-3 py-2" style="max-width: 400px;">
                          <span class="input-group-text bg-transparent border-0 text-muted">
                            <img src="<?= base_url()?>assets/images/icons/svgs/location-05.svg" alt="">
                          </span>
                          <input type="text" class="form-control border-0 bg-transparent shadow-none"
                            placeholder="Search for a location" />
                        </div>

                        <!-- Button -->
                        <button class="btn btn-purple px-4 p-5 text-white fw-semibold rounded-pill"style="width: 200px;">
                          Find a studio
                        </button>
                      </div>
                    </div>

                  </div>
                  <div class="col-12 col-md-5"><img class="img-fluid" src="<?= base_url()?>assets/images/blog/hero.png" alt=" StudioLib Man Listening to music with headphones" /></div>
                </div>
              </div>

              <div class="d-none navbar-menu position-fixed top-0 start-0 bottom-0 w-75 mw-xs" style="z-index: 9999;">
                <div class="navbar-close navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-dark"
                  style="opacity: 75%;"></div>
                <nav
                  class="position-relative h-100 w-100 d-flex flex-column justify-content-between py-8 px-8 bg-white overflow-auto">
                  <div class="d-flex align-items-center"><a class="me-auto h4 mb-0 text-decoration-none" href="#"><img
                        class="img-fluid" src="images/logo.svg" alt="" /></a> <a class="navbar-close" href="#">
                      <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="#111827" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                      </svg></a></div>
                  <div class="py-16">
                    <ul class="nav flex-column">
                      <li class="nav-item mb-8"><a class="nav-link" href="about.html">About</a></li>
                      <li class="nav-item mb-8"><a class="nav-link" href="pricing.html">Pricing</a></li>
                      <li class="nav-item mb-8"><a class="nav-link" href="blog.html">Blog</a></li>
                      <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                  </div>
                  <div><a class="btn w-100 fw-medium" href="login.html">Login</a>
                    <a class="btn w-100 btn-primary"
                      href="register.html">Sign in</a>
                  </div>
                </nav>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <section class="py-1 py-sm-3 bg-dark overflow-hidden position-relative">
      <div class="scrolling-text">
        <div class="scrolling-inner">
          <span style="margin-left: 100px;">find the ideal space for your sound with ease. </span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
          <span style="margin-left: 100px;">With a comprehensive directory of top-rated studios near you.</span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
          <span style="margin-left: 100px;">secure booking system and convenient payment options. </span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
          <!-- Duplicate for seamless looping -->
          <span style="margin-left: 100px;">find the ideal space for your sound with ease. </span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
          <span style="margin-left: 100px;">With a comprehensive directory of top-rated studios near you.</span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
          <span style="margin-left: 100px;">secure booking system and convenient payment options. </span>
          <img style="margin-left: 30px;" src="assets/images/blog/Star 7.png" alt="StudioLib star icon">
        </div>
      </div>
    </section>
    <section style="background-color: #F9F9F9;" class="py-20 ">
      <div class="container">
        <!-- Featured Studios Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">Featured Studios</h4>
          <a href="#" class="btn btn-blur-outline view-btn btn-sm">View All <i
              class="bi bi-chevron-right"></i></i></a>
        </div>
        <!-- Featured Studios Grid -->
        <div class="row g-4 mt-10">
          <!-- Studio Card -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="assets/images/studios/Rectangle 15.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="assets/images/studios/Rectangle 15 (2).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative   p-2">
                <img src="assets/images/studios/Rectangle 15 (1).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="assets/images/studios/Img.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <!-- Repeat this .col for more cards -->
        </div>
        <div class="d-flex justify-content-between mt-20 mb-4">
          <h4 class="fw-bold mb-0">Latest Studios</h4>
          <a href="#" class="btn btn-blur-outline view-btn btn-sm">View All <i
              class="bi arrow bi-chevron-right"></i></a>
        </div>
        <div class="row g-4 mt-10">
          <!-- Studio Card -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="assets/images/studios/Rectangle 15.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative  p-2">
                <img src="assets/images/studios/Rectangle 15 (2).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative   p-2">
                <img src="assets/images/studios/Rectangle 15 (1).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="assets/images/studios/Img.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save ">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="card-body">
                <small class="text-muted badge goe-loc mb-1"> <img style="padding:2px; width:20px" class="text-muted" src="<?= base_url()?>assets/images/icons/svgs/location.svg" alt="StudioLib studio location"></i>Kado, Abuja</small>
                <h6 class="fw-semibold mb-2">AudioCartz Digital Studios</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge price-tag bg-purple ">&#x20A6 50,00.00 / hr</span>
                  <small class="text-muted"><i class="bi bi-star-fill text-warning me-1"></i>4.3</small>
                </div>
              </div>
            </div>
          </div>
          <!-- Repeat this .col for more cards -->
        </div>
      </div>
    </section>
    <?= view('/templates/supercharge_section') ?>
    <section style="background-color: #F9F9F9; border-bottom: 3px solid #fff;" class="py-20 ">
      <div class="container mt-7">
        <div class="row align-items-center">

          <!-- Left side: Stacked Images -->
          <div class="col-md-7 text-center text-md-start mb-4 ">
            <div class="image-stack">
              <img width="500px" height="500px" src="assets/images/people/instrumentalists.png"
                class="img-main img-fluid rounded-4 " alt="Studio Main">
            </div>
          </div>

          <!-- Right side: Text Content -->
          <div class="col-md-5">
            <span class="badge bg-purple text-white mb-3 px-3 py-2 rounded-pill fw-semibold">For <span class="fw-bolder">Artist</span></span>
            <h4 class="fw-bold">Our platform features a vast and diverse selection of recording studios each with</h4>
            <ul class="list-unstyled mt-4">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Detailed studio profiles that
                include photos</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Equipment lists</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> User reviews</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Booking prices and information
              </li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-purple me-2"></i> Studio availability</li>
            </ul>
            <p class="text-muted">We've simplified the booking process, allowing you to secure your studio session with
              just a few clicks. No more lengthy phone calls or emails – booking a studio has never been this
              hassle-free.</p>
          </div>

        </div>
      </div>
    </section>
    <section style="background-color: #F9F9F9;" class="py-20 ">
      <div class="container">
        <div class="row align-items-center">
          <!-- Right side: Text Content -->
          <div class="col-md-7">
            <span style="background-color: #170642;" class="badge text-white mb-3 px-3 py-2 rounded-pill fw-semibold">For <span class="fw-bolder">Studios</span></span>
            <h4 class="fw-bold">Our platform features a vast and diverse selection of recording studios each with</h4>
            <ul class="list-unstyled mt-4">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Detailed studio profiles that
                include photos</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Equipment lists</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> User reviews</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Booking prices and information
              </li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-purple me-2"></i> Studio availability</li>
            </ul>
            <p class="text-muted">We've simplified the booking process, allowing you to secure your studio session with
              just a few clicks. No more lengthy phone calls or emails – booking a studio has never been this
              hassle-free.</p>
          </div>
          <!-- Left side: Stacked Images -->
          <div class="col-md-5 text-center text-md-start mb-4 ">
            <div class="image-stack">
              <img width="500px" height="500px" src="assets/images/people/studio.png"
                class="img-main img-fluid rounded-4 " alt="Studio Main">
            </div>
          </div>

        </div>
      </div>
    </section>
    <?= view('/templates/accordion_section') ?>
    <?= view('/templates/get_in_touch_section') ?>
    <?= view('/templates/footer_view') ?>
  </div>
  <script>
    const words = [
      "Book Studio sessions!", "Powerup Your Creative Journey!", "Find Amazing Studios Near You!", "Work With Creative Profesionals!",
    ];

    let i = 0;
    const span = document.getElementById("spin");
    setInterval(() => {
      span.style.opacity = 0;
      setTimeout(() => {
        span.textContent = words[i];
        span.style.opacity = 1;
        i = (i + 1) % words.length;
      }, 500); // wait for fade-out before changing text
    }, 5000);
    // changes every 2 seconds
  </script>

  <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>