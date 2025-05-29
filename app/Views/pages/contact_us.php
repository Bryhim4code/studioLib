app/Views/pages/auth/auth_view.php<html lang="en">

<?= view('/templates/head') ?>
<style>
  .auth-sec {
    background: url('<?= base_url() ?>assets/images/auth/authbg.png') no-repeat center center / cover;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* .form-toggle .btn {
      border-radius: 20px;
      padding: 0.5rem 1rem;
    } */
  .form-box {
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    margin: auto;
    max-width: 500px;
    width: 100%;
  }

  /* form {
    max-width: 400px;
    margin: auto;
  } */
  /* input[type="email"],
  input[type="password"],
  input[type="text"] {
    border-radius: 50px;
    padding: 10px;
    border: 1px solid #ccc;
    transition: border-color 0.3s;
  }
  input[type="email"]:focus,
  input[type="password"]:focus, 
  input[type="text"]:focus {
    border-color: #9E00FF;
    box-shadow: 0 0 5px rgba(158, 0, 255, 0.5);
  } */
</style>

<body>
  <div>
    <?= view('/templates/header_view') ?>
    <section class="py-5 p-20 auth-sec text-center">
      <div class="container mt-40 mb-20 text-center">

       

        <!-- Sign In Form -->
        <form id="signInForm" class="form-box" autocomplete="off">
          <h5 class="p-5 fw-medium fs-5">Contact Us</h5>
          <div class="mb-3 auth text-start mb-4">
            <label class="text-start mb-2 text-muted" for="Email">Email Address</label>
            <input type="email" class="form-control mb-3" placeholder="Enter your email">
          </div>
          <div class="mb-3 auth text-start mb-4">
            <label class="text-start mb-2 text-muted" for="Email">Phone Number</label>
            <input type="email" class="form-control mb-3" placeholder="Enter your email">
          </div>
         <div class="mb-3 auth text-start mb-4">
  <label for="userType" class="form-label text-muted mb-2">User Type</label>
  <select id="userType" name="userType" class="form-control" required>
    <option value="" disabled selected>Select your user type</option>
    <option value="artist">Artist</option>
    <option value="manager">Manager</option>
    <option value="studio">Studio</option>
  </select>
</div>

          <!-- Password Input with Toggle -->
          <div class="mb-3 auth text-start mb-4 position-relative">
            <label class="mb-3 text-muted" for="passwordSignIn" >Message</label>
            <textarea class="form-control mb-3" placeholder="Enter your Message" name="" id=""></textarea>
          </div>
          
          <button class="btn btn-purple rounded-pill w-100 mb-2 mt-3">Send Message</button>
        </form>
      </div>
    </section>

    <?= view('/templates/footer_view') ?>
  </div>

  <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
 
</body>

</html>