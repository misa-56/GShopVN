      <div class="abc" >
        <nav class="container d-none d-md-flex justify-content-between align-items-center">
    <div class="text-white rounded bg-info px-2 ">
          <span>Hỗ trợ nhanh nhất tại Zalo: <a class="text-white" href="https://zalo.me/0965324305" target="_blank">0965324305</a></span>
  </div>

          <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>

<div class="">
          <?php include_once(__DIR__ . '/accounts.php'); ?>
</div>
          
        </nav>
        
      </div>
      <nav
        class="headerTop container navbar d-md-flex justify-content-between align-items-center "
      >
        <div class="logo mx-auto mx-md-0 d-flex justify-content-center d-md-block">
          <a href="/" class="text-decoration-none">
                <div class="d-flex">
            <div class="pt-2">
              <img
                  class="rounded"
                  src="images/Logo.png"
                  alt="GShop"
                  width="100px"
                  height="100px"
                />
            </div>
            <div class="">
              <div class="navbar-brand text-white w-100 m-0 py-0" style="font-size: 50px;">GShop</div>
              <div class="navbar-brand text-white d-block text-center py-0 m-0 w-100 " href="/" style="font-size: 17px;">Tài khoản Premium</div>
            </div>
          </div>
          </a>
        </div>
        
        <div class="search-bar text-center mt-4 w-100 w-md-50">
          <?php include_once(__DIR__ .'/search-bar.php'); ?>
        </div>

        <div class="border rounded mb-2">
          <div class="d-none d-md-block">
              <?php include(__DIR__ . '/carts.php'); ?>
            </div>
        </div>

        <!-- </div> -->
      </nav>

      <nav class="headerBot navbar navbar-dark navbar-expand-md p-0" style="background-color: #4267b2;">
        <div class="container">
          <button
            class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#collapsibleNavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="d-flex justify-content-end align-items-center">
            <div class="d-block d-md-none">
                <?php include(__DIR__ . '/carts.php'); ?>
            </div>
            <div class="d-block d-md-none">
                <?php include(__DIR__ . '/accounts.php'); ?>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white " href="/">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="about.php"
                  >Giới thiệu</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="san-pham.php"
                  >Sản phẩm</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="thong-bao.html"
                  >Thông báo</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="review.html"
                  >Review</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="feedback.html"
                  >Feedback</a
                >
              </li>

              <li class="nav-item">
                <a
                  class="nav-link text-white"
                  href="huong-dan-mua-hang.html"
                  >Hướng dẫn mua hàng</a
                >
              </li>
              
            </ul>
            
          </div>
          
        </div>
      </nav>