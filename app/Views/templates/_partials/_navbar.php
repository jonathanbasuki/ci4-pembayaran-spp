<header class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-6">
        <div class="header-left d-flex align-items-center">
          <div class="menu-toggle-btn mr-20">
            <button id="menu-toggle" class="main-btn primary-btn btn-hover"
            ><i class="lni lni-chevron-left me-2"></i> Menu</button>
          </div>
          <!-- <div class="header-search d-none d-md-flex">
            <form action="#">
              <input type="text" placeholder="Search..." />
              <button><i class="lni lni-search-alt"></i></button>
            </form>
          </div> -->
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-6">
        <div class="header-right">

          <!-- filter start -->
          <!-- <div class="filter-box ml-15 d-none d-md-flex">
            <button class="" type="button" id="filter">
              <i class="lni lni-funnel"></i>
            </button>
          </div> -->
          <!-- filter end -->

          <!-- profile start -->
          <div class="profile-box ml-15">
            <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="profile-info">
                <div class="info">
                  <h6>
                    <?php if (in_groups('admin') || in_groups('petugas')) {
                      echo user()->username;
                    } else {
                      $name = explode(' ', user()->nama);

                      if (count($name) > 1) {
                        echo ucwords(strtolower($name[array_key_first($name)] . ' ' . $name[array_key_last($name)]));
                      } else {
                        echo ucwords(strtolower($name[array_key_first($name)]));
                      }
                    } ?>
                  </h6>
                  <div class="image">
                    <img src="<?= base_url(); ?>/assets/images/profile/profile-image.svg" alt="Profile Picture"/>
                    <span class="status"></span>
                  </div>
                </div>
              </div>
              <i class="lni lni-chevron-down"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <!-- <li>
                    <a href="<?= base_url('/profile'); ?>">
                    <i class="lni lni-user"></i> View Profile
                    </a>
                    </li>
                    <li>
                    <a href="<?= base_url('/settings'); ?>"> <i class="lni lni-cog"></i> Settings </a>
                  </li> -->
                  <li>
                    <a href="<?= base_url('/logout'); ?>"> <i class="lni lni-exit"></i> Sign Out </a>
                  </li>
                </ul>
              </div>
              <!-- profile end -->

            </div>
          </div>
        </div>
      </div>
    </header>