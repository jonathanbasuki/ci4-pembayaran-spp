<aside class="sidebar-nav-wrapper">
  <div class="navbar-logo">
    <a href="<?= base_url('/'); ?>">
      <img src="<?= base_url(); ?>/assets/images/home/values-1.png" alt="logo" width="100px" />
    </a>
  </div>
  <nav class="sidebar-nav">
    <ul>
      <li class="nav-item">
        <a href="<?= base_url('/dashboard'); ?>">
          <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
              <path
              d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
              />
            </svg>
          </span>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <span class="divider"><hr /></span>

      <?php if (in_groups('admin')): ?>
        <li class="nav-item">
          <a href="<?= base_url('/petugas'); ?>">
            <span class="icon"><i class="lni lni-users fs-3"></i></span>
            <span class="text">Petugas</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/kelas'); ?>">
            <span class="icon"><i class="lni lni-grid-alt fs-4"></i></span>
            <span class="text">Kelas</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/spp'); ?>">
            <span class="icon"><i class="lni lni-tag fs-4"></i></span>
            <span class="text">SPP</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/siswa'); ?>">
            <span class="icon"><i class="lni lni-user fs-4"></i></span>
            <span class="text">Siswa</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/pembayaran'); ?>">
            <span class="icon"><i class="lni lni-customer fs-3"></i></span>
            <span class="text">Tagihan</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/laporan'); ?>">
            <span class="icon"><i class="lni lni-invest-monitor fs-3"></i></span>
            <span class="text">Laporan</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if (in_groups('petugas')): ?>
        <li class="nav-item">
          <a href="<?= base_url('/pembayaran'); ?>">
            <span class="icon"><i class="lni lni-customer fs-3"></i></span>
            <span class="text">Tagihan</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/riwayat'); ?>">
            <span class="icon"><i class="lni lni-invest-monitor fs-3"></i></span>
            <span class="text">Riwayat</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if (! (in_groups('admin') || in_groups('petugas'))): ?>
      <li class="nav-item">
        <a href="<?= base_url('/riwayat'); ?>">
          <span class="icon"><i class="lni lni-invest-monitor fs-3"></i></span>
          <span class="text">Tagihan Saya</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
</aside>