<html lang="en">

<?= view('/templates/head') ?>

<body>
  <div>
    <!-- Header -->
    <?= view('/templates/header_view') ?>

    <section style="background-color: #fff;" class="p-20 mt-16">
      <!-- <div class=" -4"> -->
      <!-- Studio Header -->
      <div class="d-flex  flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div>
          <h4 class="fw-bold ">Epicheights Studio</h4>
          <div class="d-flex gap-2 flex-wrap small text-muted">
            <span class="btn text-muted btn-purple-outline rounded-pill ">Verified Studio</span>
            <span class="btn text-muted btn-outline rounded-pill text-bg-info-light">Listed Price</span>
            <span class="btn text-muted btn-outline rounded-pill text-bg-info-light">Standard Studio</span>
            <span class="btn text-muted btn-outline rounded-pill text-bg-info-light">Standard Studio</span>
          </div>
        </div>
        <a class="btn btn-outline rounded-pill text-bg-info-light text-muted  mt-2 mt-md-0"><i class="bi bi-heart"></i>
          Save for later</a>
      </div>

      <!-- Images Gallery -->
      <div class="row mb-4">
        <div class="col-md-6">
          <img src="assets/images/studios/details1.png" class="img-fluid rounded mb-3" alt="Studio Image 1">

        </div>
        <div class="col-md-6">
          <img src="assets/images/studios/details2.png" class="img-fluid rounded mb-3" alt="Studio Image 1">

        </div>
        <div class="d-flex gap-2 overflow-auto">
          <img src="assets/images/studios/details2.png" class="img-thumbnail" width="100" alt="Thumb 1">
          <img src="assets/images/studios/details2.png" class="img-thumbnail" width="100" alt="Thumb 2">
          <img src="assets/images/studios/details2.png" class="img-thumbnail" width="100" alt="Thumb 3">
        </div>

      </div>

      <!-- Description + Equipment + Portfolio -->
      <div class="row g-4">
        <div class="col-md-7 details-cards">
          <div class="card p-7 shadow-sm details-cards">
            <div class="d-flex align-items-center mb-3 ">
              <img width="50px" height="50px" src="assets/images/studios/details1.png"
                class="img-fluid studio-logo me-3" alt="Studio Image 1">
              <div class="mt-3">
                <small class="text-muted">Posted by:</small>
                <p><strong>Epicheights Recordings</strong> <img src="assets/images/icons/checkmark-badge-01.png" alt="">
                </p>
              </div>
            </div>
            <hr class="mt-1 text-muted">
            <p class="text-dark fs-7 mt-5">Welcome to Epic Heights Studio in Lagos, where every note soars. Our
              cutting-edge facilities and expert team are dedicated to helping you realize your musical vision. Join us
              and elevate your sound to new heights.....</p>

            <p class="text-purple underline">Show more</p>
            <hr class="mt-1 text-muted">
            <h5 class="mt-4 fs-5 mb-5 fw-bold">Studio Equipment</h5>
            <ul class="list-unstyled py-2 gap-1 row row-cols-2 small">
              <li class="p-3 studio-set mt-2"> <span>🎧</span> Audio Technica M50x</li>
              <li class="p-3 studio-set mt-2"> <span>🎙️</span> Rode NT2-A</li>
              <li class="p-3 studio-set mt-2"> <span>🔊</span> AudioBox 1818VSL</li>
              <li class="p-3 studio-set mt-2"> <span>🔈</span> Yamaha HS8</li>
            </ul>
            <hr class="mt-1 text-muted">
            <h6 class="mt-4 fs-5 mb-7 fw-bold">What this studio offers</h6>
            <div class="d-flex flex-wrap gap-2">
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Acoustic Treatment</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> WiFi</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Lounge Area</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Air Conditioning</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> In-house Producer</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Music Distribution</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Drinking Space</span>
              <span class="badge text-dark p-3 studio-offering light-grey"><i class="bi bi-plus"></i> Artist Management</span>
            </div>

            <button class="btn card-btn rounded-pill p-4 py-4 btn-dark btn-sm ">Show all offerings</button>
            <div class="car p-3 mt-10 ">
              <h6 class="mb-3 fs-5 mb-7 fw-bold">Production Portfolio</h6>
              <div class="row g-2">
                <div class="col-6">
                  <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/26snEPD7PHCU2CwLg1cG1n?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
                <div class="col-6">
                  <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/73MqdkXMRCZv6RyMjCNdJ7?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
                <div class="col-6">
                  <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/5yyUPpQq3v28eMUuUb9wvK?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
                <div class="col-6">
                  <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/13fUYwIjrXcXL1gDNRDzHS?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
              </div>
            </div>
            <button class="btn card-btn rounded-pill p-4 py-4 btn-dark btn-sm ">Show all 100 songs</button>
          </div>
        </div>

        <div class="col-md-5 details-cards">
          <div class="card p-5 border-5 shadow-sm details-cards ">
            <p class="text-muted mb-1 fw-medium">Minimum rate</p>
            <p class=" fs-4 fw-bold text-purple">₦15,000<span class="fs-6 text-muted"> / Hour</span></p>
            <hr class="mt-1">
            <button class="btn rounded-pill btn-purple w-100 mt-3">Contact Studio</button>
            <button style="font-family: 'syne';" class="btn rounded-pill  btn-outline-dark w-100 mt-3">Drop a review</button>
            <!-- <input type="text" class="form-control mt-2 rounded-pill" placeholder="Drop a review"> -->

            <hr>
            <div class="p-4 my-4">
              <h4 class="mb-4 fs-5 mb-7 fw-bold">Studio Reviews</h4>

              <div class="d-flex justify-content-between align-items-start gap-7 mb-3">
                <div class="d-flex align-items-center mb-3">
                  <h1 class="display-5 fw-bold mb-">4.5</h1>
                  <span class="ms- text-warning fs-6">★</span>
                </div>

                <!-- Rating Distribution -->
                <div class="mb-4 w-100 ml-10">
                  <div class="d-flex align-items-center mb-">
                    <div class="me-2 fs-10">5</div>
                    <div class="progress flex-grow-1" style="height: 4px;">
                      <div class="progress-bar bg-success" style="width: 50%"></div>
                    </div>
                    <div class="ms-2 small text-muted">50.0%</div>
                  </div>
                  <div class="d-flex align-items-center mb-">
                    <div class="me-2 fs-10">4</div>
                    <div class="progress flex-grow-1" style="height: 4px;">
                      <div class="progress-bar bg-success" style="width: 50%"></div>
                    </div>
                    <div class="ms-2 small text-muted">50.0%</div>
                  </div>
                  <div class="d-flex align-items-center mb-">
                    <div class="me-2 fs-10">3</div>
                    <div class="progress flex-grow-1 bg-light" style="height: 4px;"></div>
                    <div class="ms-2 small text-muted">0.0%</div>
                  </div>
                  <div class="d-flex align-items-center mb-">
                    <div class="me-2 fs-10">2</div>
                    <div class="progress flex-grow-1" style="height: 4px;">
                      <div class="progress-bar bg-warning" style="width: 20%"></div>
                    </div>
                    <div class="ms-2 small text-muted">20.0%</div>
                  </div>
                  <div class="d-flex align-items-center mb-">
                    <div class="me-2 fs-10">1</div>
                    <div class="progress flex-grow-1" style="height: 4px;">
                      <div class="progress-bar bg-danger" style="width: 10%"></div>
                    </div>
                    <div class="ms-2 small text-muted">10.0%</div>
                  </div>
                </div>
              </div>

              <div class="d-flex mb-7 justify-content-between align-items-center mb-3">
                <h6 class="mb-0 fs-8 fw-bold">All Reviews (4)</h6>
                <a href="#" class="text-secondary" data-bs-toggle="modal" data-bs-target="#addReviewModal">+ Add Review</a>
              </div>

              <!-- Reviews List -->
              <ul class="list-unstyled">
                <li class="mb-4">
                  <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-person-circle fs-6 me-2"></i>
                    <strong>Anonymous User</strong>

                  </div>
                  <div class="d-flex">
                    <div class="text-warning mb-1">★★★★☆</div>
                    <small class="text-muted ms-2">05/11/2024 10:41:04 PM</small>
                  </div>
                  <p class="mb-0"><em>(Edited)</em> fantastic staff</p>
                </li>
                <li class="mb-4">
                  <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-person-circle fs-6 me-2"></i>
                    <strong>Anonymous User</strong>

                  </div>
                  <div class="d-flex">
                    <div class="text-warning mb-1">★★★★☆</div>
                    <small class="text-muted ms-2">05/11/2024 10:40:48 PM</small>
                  </div>
                  <p class="mb-0">i enjoyed my time here</p>
                </li>
                <li class="mb-4">
                  <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-person-circle fs-6 me-2"></i>
                    <strong>Anonymous User</strong>

                  </div>
                  <div class="d-flex">
                    <div class="text-warning mb-1">★★★★☆</div>
                    <small class="text-muted ms-2">05/11/2024 10:40:26 PM</small>
                  </div>
                  <p class="mb-0">epic</p>
                </li>
                <li class="mb-4">
                  <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-person-circle fs-6 me-2"></i>
                    <strong>salam</strong>

                  </div>
                  <div class="d-flex">
                    <div class="text-warning mb-1">★★★★☆</div>
                    <small class="text-muted ms-2">05/11/2024 10:40:11 PM</small>
                  </div>
                  <p class="mb-0"><em>(Edited)</em> amazing recording space</p>
                </li>
              </ul>

              <!-- Bottom Buttons -->
              <div class="d-flex justify-content-end gap-3 mt-10">
                <button class="btn btn-outlinesecondary btn-sm"><i class="bi fs-9 bi-download"></i> Download Data</button>
                <button class="btn btn-outlin-dark btn-sm"><i class="bi fs-9 bi-eye-slash"></i> Hide reviews</button>
              </div>
            </div>

            <!-- <a href="#" class="text-decoration-none small mb-0 fs-8 fw-bold">See all reviews →</a> -->
          </div>
        </div>
      </div>
      <!-- </div> -->
    </section>

    <!-- Footer -->
    <?= view('/templates/review_modal') ?>
    <?= view('/templates/footer_view') ?>

  </div>
  <script>
    const words = [
      "Book Studio sessions!", "Powerup Your Creative Journey!", "Find Amazing Studios Near You!", "Work With Creative Profesionals",
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