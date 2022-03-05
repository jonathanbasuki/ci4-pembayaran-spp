<?= $this->extend('templates/base_auth'); ?>
<?= $this->section('auth'); ?>

<section class="signin-section">
  <div class="container-fluid p-0 m-0 h-100">
    <div class="row g-0 auth-row">
      <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
          <div class="auth-cover">
            <div class="title text-center">
              <h1 class="text-primary mb-10">Selamat Datang!</h1>
              <p class="text-medium">
                Gunakan akun Anda yang sudah didaftarkan.
              </p>
            </div>
            <div class="cover-image">
              <img src="<?= base_url(); ?>/assets/images/auth/signin-image.svg" alt="" />
            </div>
            <div class="shape-image">
              <img src="<?= base_url(); ?>/assets/images/auth/shape.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->

      <div class="col-lg-6">
        <div class="signin-wrapper">
          <div class="form-wrapper">
            <h6 class="mb-15">Masuk</h6>
            <p class="text-sm mb-25">
              Gunakan akun Anda yang sudah didaftarkan.
            </p>

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>

            <?php if (session()->has('error')) : ?>
            <div class="alert-box danger-alert">
              <div class="alert fade show" role="alert">
                <p class="text-medium">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <?= session('error') ?>
                </p>
              </div>
            </div>
          <?php endif ?>

          <form action="<?= route_to('login') ?>" method="post">

            <?= csrf_field() ?>

            <div class="row">
              <div class="col-12">
                <div class="input-style-1">
                  <label for="login">NISN or username</label>
                  <input type="text" name="login" id="login" placeholder="NISN or username" class="form-control" />
                </div>
              </div>
              <!-- end col -->
              <div class="col-12">
                <div class="input-style-1">
                  <label for="password"><?=lang('Auth.password')?></label>
                  <input type="password" name="password" id="password" placeholder="<?=lang('Auth.password')?>" class="form-control" />
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end col -->
            <div class="col-12">
              <div class="button-group d-flex justify-content-center flex-wrap">
                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">Sign In</button>
              </div>
            </div>
            <!-- end col -->
          </form>

          <!-- <p class="text-sm text-medium text-dark text-center mt-4">
            Don’t have any account yet?
            <a href="<?= base_url('/register'); ?>">Create an account</a>
          </p> -->
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<?= $this->endSection(); ?>