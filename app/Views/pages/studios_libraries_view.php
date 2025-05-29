<html lang="en">
<?= view('/templates/head') ?>

<body>
  <div>
  <?= view('/templates/header_view') ?>
    <section style="background-color: #fff;" class="p-20 mt-11">
      <div class="container">
        <div class="row  mb-4 align-items-center">
          <div class="d-flex col-md-8  align-items-center gap-3">
            <!-- Search input -->
            <div class="input-group rounded-pill search px-2 p-1" style="max-width: 300px;">
              <span class="input-group-text bg-transparent border-0 text-muted">
                <i class="bi bi-search"></i>
              </span>
              <input type="text" class="form-control border-0 bg-transparent shadow-none"
                placeholder="Search for a location" />
            </div>

            <!-- Button -->
            <button class="btn btn-purple px-4 p-4 text-white fw-semibold rounded-pill"
              >
              Find a studio
            </button>
          </div>
          <div style="width: auto ; margin-left: 40px;"
            class="col-md-4 rounded-pill light-grey  text-md-end mt-3 mt-md-0 p-1">
            <button class="btn btn-dark rounded-pill "><img width="20px" src="<?=base_url()?>assets/images/icons/grid-view.png" alt=""> Grid
              View</button>
            <button class="btn rounded-pill"><img width="20px" src="<?=base_url()?>assets/images/icons/maping.png" alt=""> Map
              View</button>
          </div>
        </div>
      </div>

      <div class="container bt">
        <!-- Top Section: Search & View Options -->
        <h3 class="fw-semibold mb-6 mt-10 border-">Studio Library</h3>
        <!-- Filter & Sort Buttons -->
        <div class="d-flex flex-wrap gap-1 mb-4">
          <div style="border: 1px solid #35343418;" class="d-flex gap-1 blur-bg p-1 rounded-pill ">
            <button class="btn btn-dark p-3 rounded-pill">Near You</button>
            <button class="btn p-3 rounded-pill">Standard Studios</button>
            <button class="btn p-3 rounded-pill">Podcast Studios</button>
            <button class="btn p-3  rounded-pill">Live Studios</button>
            <button class="btn p-3 rounded-pill">Rehearsal Studios</button>
            <button class="btn p-3  rounded-pill">Verified Studios</button>
          </div>
          <div class="ms-auto">
            <select class="form-select w-75 p-3 rounded-pill">
              <option>Sort by:</option>
              <option>Price (low to high)</option>
              <option>Rating</option>
            </select>
          </div>
        </div>
        <!-- Featured Studios Grid -->
        <div class="row g-4 mt-10">
          <!-- Studio Card -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 rounded-4 shadow-sm h-100">
              <div class="position-relative p-2">
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15 (2).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15 (1).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Img.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15 (2).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Rectangle 15 (1).png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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
                <img src="<?=base_url()?>assets/images/studios/Img.png" class="card-img-top rounded-top-4" alt="Studio">
                <button class="btn text-white position-absolute top-0 end-0 m-2 p-2 mt-4 save p-2 mt-4 save">
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

        </div>
        <!-- Pagination -->
        <nav class="mt-20">
          <ul class="pagination
            justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>

      </div>
    </section>
    <!-- Footer -->
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