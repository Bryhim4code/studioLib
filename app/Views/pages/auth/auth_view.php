<html lang="en">

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

        <!-- Toggle Buttons -->
        <div class="form-toggle mb-7 p-2 light-grey rounded-pill" style="max-width:310px; margin:auto; ">
          <button id="toggleSignIn" class="btn btn-purple text-light rounded-pill">For Artists</button>
          <button id="toggleSignUp" class="btn rounded-pill">For Studios</button>
        </div>

        <!-- Sign In Form -->
        <form action="<?= base_url() . 'auth' ?>" method="post" id="signInForm" class="form-box" autocomplete="off">
          <h5 class="p-5 fw-medium fs-5">Sign In</h5>
          <div class="mb-3 auth text-start mb-4">
            <label class="text-start  mb-2" for="Email">Email Address</label>
            <input name="email" type="email" class="form-control mb-3" placeholder="Enter your email">
          </div>
          <!-- Password Input with Toggle -->
          <div class="mb-3 auth text-start mb-4 position-relative">
            <label class=" mb-2" for="passwordSignIn">Password</label>
            <input name="password" type="password" id="passwordSignIn" class="form-control" placeholder="Enter your password">
            <span class="position-absolute top-50 end-0 translate-middle-y mt-3 p-3 pe-3" onclick="togglePassword('passwordSignIn', 'togglePasswordIconSignIn')" style="cursor: pointer;">
              <i id="togglePasswordIconSignIn" class="bi bi-eye-slash"></i>
            </span>
          </div>
          <div class="d-flex justify-content-between mb-3 mt-7">
            <div>
              <input type="checkbox" class="light-grey"> Remember Me
            </div>
            <a class="text-purple fw-medium" href="#">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-purple rounded-pill w-100 mb-2 mt-3">Sign In</button>
          <!-- <button class="btn btn-outline-dark rounded-pill w-100">Continue with Google</button> -->
          <p class="mt-3 text-muted">Don't have an account? <a class="text-purple fw-medium" href="#">Sign up</a></p>
        </form>

        <!-- Sign Up Form -->
        <form action="<?= base_url() . 'auth' ?>" method="post" id="signUpForm" class="d-none form-box" autocomplete="off">
          <h5 class="p-5 fw-medium fs-5">Sign In</h5>
          <div class="mb-3 auth text-start mb-4">
            <label class="text-start  mb-2" for="Email">Email Address</label>
            <input name="email" type="email" class="form-control mb-3" placeholder="Enter your email">
          </div>
          <!-- Password Input with Toggle -->
          <div class="mb-3 auth text-start mb-4 position-relative">
            <label class=" mb-2" for="passwordSignUp">Password</label>
            <input name="password" type="password" id="passwordSignUp" class="form-control" placeholder="Enter your password">
            <span class="position-absolute top-50 end-0 translate-middle-y mt-3 p-3 pe-3" onclick="togglePassword('passwordSignUp', 'togglePasswordIconSignUp')" style="cursor: pointer;">
              <i id="togglePasswordIconSignUp" class="bi bi-eye-slash"></i>
            </span>
          </div>
          <div class="d-flex justify-content-between mb-3 mt-7">
            <div>
              <input type="checkbox" class="light-grey"> Remember Me
            </div>
            <a class="text-purple fw-medium" href="#">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-purple rounded-pill w-100 mb-2 mt-3">Sign In</button>
          <!-- <button class="btn btn-outline-dark rounded-pill w-100">Continue with Google</button> -->
          <p class="mt-3 text-muted">Don't have an account? <a class="text-purple fw-medium" href="#">Sign up</a></p>
        </form>
      </div>
    </section>

    <?= view('/templates/footer_view') ?>
  </div>


  <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    const toggleSignIn = document.getElementById('toggleSignIn');
    const toggleSignUp = document.getElementById('toggleSignUp');
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');

    toggleSignIn.addEventListener('click', () => {
      signInForm.classList.remove('d-none');
      signUpForm.classList.add('d-none');
      toggleSignIn.classList.add('btn-purple', 'text-light');
      toggleSignUp.classList.remove('btn-purple', 'text-light');
    });

    toggleSignUp.addEventListener('click', () => {
      signInForm.classList.add('d-none');
      signUpForm.classList.remove('d-none');
      toggleSignUp.classList.add('btn-purple', 'text-light');
      toggleSignIn.classList.remove('btn-purple', 'text-light');
    });
  </script>
  <script>
  function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";

    icon.classList.toggle("bi-eye", isPassword);
    icon.classList.toggle("bi-eye-slash", !isPassword);
  }
</script>
 
</body>

</html>