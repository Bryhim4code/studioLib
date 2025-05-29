<html lang="en">
<?= view('/templates/head') ?>

<style>
  .avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
  }

  .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .chat-label {
    margin-left: 10px;
  }

  .chat-label strong {
    display: block;
    font-size: 1rem;
    color: #333;
  }

  .chat-label .text-muted {
    font-size: 0.875rem;
    color: #888;
  }

  .chat-sidebar {
    height: 100vh;
    background-color: #fff;
    border-right: 1px solid #e0e0e0;
  }

  .chat-sidebar .search-box {
    padding: 1rem;
  }

  .chat-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .chat-list li {
    padding: 1rem;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
  }

  .chat-list li.active {
    border-left: 4px solid #6c63ff;
    background-color: #f0f0ff;
  }

  .chat-box {
    height: 100vh;
    display: flex;
    flex-direction: column;
    background-color: #f5f6fa;
  }

  .chat-header {
    padding: 1rem;
    /* border-bottom: 1px solid #e0e0e0; */
    background-color: #fff;
  }

  .chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
  }

  .message {
    max-width: 55%;
    margin-bottom: 1rem;
  }

  .message.outgoing {
    margin-left: auto;
    background-color: #7a3cff;
    color: white;
    border-radius: 15px 15px 0 15px;
    padding: 0.75rem;
  }

  .message.incoming {
    background-color: #f1f1f1;
    border-radius: 0 15px 15px 15px;
    padding: 0.75rem;
  }

  .chat-footer {
    padding: 1rem;
    border-top: 1px solid #e0e0e0;
    background-color: #fff;
  }

  .send-btn {
    background-color: #7a3cff;
    border: none;
  } 
</style>

<body>
  <div>
    <?= view('/templates/header_view') ?>
    <section class="chat-section p-5 mt-20">
      <div class="container-fluid mt-1"></div>
      <div class="row">
        <div class="col-md-4 col-lg-3 chat-sidebar">
          <h4 class="fw-medium mt-4">Messages </h4>
          <div class="search-box rounded-pill">
            <input type="text" class="form-control  rounded-pill" placeholder="Search for chats...">
          </div>
          <ul class="chat-list">
            <li class="active">
              <div class="d-flex">
                <div class="avatar">
                  <img src="<?= base_url() ?>assets/images/team/avatar (1).png" alt="Avatar" class="rounded-circle">
                </div>
                <div class="chat-label">
                  <strong>Studio Name</strong>
                  <div class="text-muted small">What time will it be ready?</div>
                </div>
              </div>
            </li>
            <li class="">
              <div class="d-flex">
                <div class="avatar">
                  <img src="<?= base_url() ?>assets/images/team/avatar (1).png" alt="Avatar" class="rounded-circle">
                </div>
                <div class="chat-label">
                  <strong>Studio Name</strong>
                  <div class="text-muted small">Good point. Typography is...</div>
                </div>
              </div>
            </li>
            <li class="">
              <div class="d-flex">
                <div class="avatar">
                  <img src="<?= base_url() ?>assets/images/team/avatar (1).png" alt="Avatar" class="rounded-circle">
                </div>
                <div class="chat-label">
                  <strong>Studio Name</strong>
                  <div class="text-muted small">That’s a good idea. I’ll have...</div>
                </div>
              </div>
            </li>
            <li class="">
              <div class="d-flex">
                <div class="avatar">
                  <img src="<?= base_url() ?>assets/images/team/avatar (1).png" alt="Avatar" class="rounded-circle">
                </div>
                <div class="chat-label">
                  <strong>Studio Name</strong>
                  <div class="text-muted small">Sure, that sounds good...</div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-9 col-lg-9 chat-box">
          <div class="chat-header">
            <div class="d-flex">
                <div class="avatar">
                  <img src="<?= base_url() ?>assets/images/team/avatar (1).png" alt="Avatar" class="rounded-circle">
                </div>
                <div class="chat-label">
                  <strong>Studio Name</strong>
                  <div class="text-success small">Active</div>
                </div>
              </div>
          </div>
          <div class="chat-messages">
            <div class="message incoming">
              Girl it. And what's your take on incorporating animations? I've seen them on many sites lately.
            </div>
            <div class="message outgoing">
              Animations can enhance user engagement, but use them judiciously. Subtle animations for transitions or highlighting elements can make the site feel dynamic without overwhelming users.
            </div>
            <div class="message incoming">
              That makes sense. How about mobile responsiveness? It's a must nowadays, right?
            </div>
            <div class="message outgoing">
              Absolutely. More users access websites from mobile devices. Design for mobile-first ensures that the site looks and functions well on smaller screens.
            </div>
          </div>
          <div class="chat-footer d-flex align-items-center">
            <input type="text" class="form-control me-2" placeholder="Type a message...">
            <button class="btn btn-primary send-btn">
              <i class="bi bi-send"></i>
            </button>
          </div>
        </div>
      </div>
  </div>
  </section>

  <!-- Footer -->
  <?= view('/templates/footer_view') ?>
  </div>


  <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>