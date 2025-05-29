<html lang="en">

<?= view('/templates/head') ?>

<body>
  <div>
    <?= view('/templates/header_view') ?>
    <div class="mt-20"mt-20">
      <div class="text-center text-white position-relative "
        style="background: url('<?= base_url() ?>assets/images/headers/how-it-works.png') no-repeat center center / cover; min-height: 250px;">
        <h1 class=" badge fw-bold fs-3 mt-5 text-center text-light position-absolute top-50 start-50 translate-middle">How it Works</h1>
      </div>
    </div>

    <section class="py-5 mt-10 p-20 text-center" style="background: #fff;">
      <!-- Heading -->
      <div class=" mt-10">
        <span class=" text-muted mb-5 gt-header rounded-pill text-dark p-3 fw-semibold mb-3">Getting <span class="fw-bolder text-dark">Started</span></span>
        <h2 class="fw-bold fs-4 mt-5 mb-5">How do you use StudioLib?</h2>

        <p class="mx-auto" style="max-width: 700px;">
          Welcome to StudioLib! Whether you're an artist looking for the perfect studio or a studio manager aiming to streamline bookings, our platform has you covered. Watch this quick guide to learn how to create your profile, book studio time, and manage your sessions with ease. Let’s make great music together!
        </p>

        <!-- Video Thumbnail or Embed -->
        <div class="ratio ratio-16x9 rounded overflow-hidden mt-10" style="max-width: 850px; margin: auto;">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/AwJGKMRhn-A?si=RYO12srUm1kWvuuZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <!-- <video controls poster="video-thumbnail.jpg">
            Your browser does not support the video tag.
          </video> -->
        </div>
      </div>
    </section>

    <style>
      .text-purple {
        color: #8A2BE2;
        /* Purple shade to match your theme */
      }
    </style>
    <?= view('/templates/supercharge_section') ?>
    <?= view('/templates/accordion_section') ?>
    <?= view('/templates/get_in_touch_section') ?>
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