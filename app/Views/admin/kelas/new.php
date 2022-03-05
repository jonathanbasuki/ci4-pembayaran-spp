<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Tambah Kelas</h2>
			</div>
		</div>
		<!-- end col -->
		<div class="col-md-6">
			<div class="breadcrumb-wrapper mb-30">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="<?= base_url('/kelas'); ?>">Data Kelas</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah Kelas
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
</div>

<div class="form-elements-wrapper">
	<div class="row">
		<div class="card-style">
			<form action="<?= base_url('/kelas'); ?>" method="post">
				<div class="input-style-1">
					<label for="kelas">Kelas</label>
					<select name="kelas" id="kelas" class="form-control <?php if(session('errors.kelas')) : ?>is-invalid<?php endif ?>">
						<option value="" <?= (old('kelas') == '') ? 'selected' : ''; ?>>-- Pilih Kelas --</option>
						<option value="X" <?= (old('kelas') == 'X') ? 'selected' : ''; ?>>X</option>
						<option value="XI" <?= (old('kelas') == 'XI') ? 'selected' : ''; ?>>XI</option>
						<option value="XII" <?= (old('kelas') == 'XII') ? 'selected' : ''; ?>>XII</option>
					</select>
					<div class="invalid-feedback">
						<?= session('errors.kelas') ?>
					</div>

					<label for="jurusan" class="mt-3">Jurusan</label>
					<select name="jurusan" id="jurusan" class="form-control <?php if(session('errors.jurusan')) : ?>is-invalid<?php endif ?>">
						<option value="" <?= (old('jurusan') == '') ? 'selected' : ''; ?>>-- Pilih Jurusan --</option>
						<option value="AKL" <?= (old('jurusan') == 'AKL') ? 'selected' : ''; ?>>Akuntansi dan Keuangan Lembaga</option>
						<option value="BDP" <?= (old('jurusan') == 'BDP') ? 'selected' : ''; ?>>Bisnis Daring dan Pemasaran</option>
						<option value="OTKP" <?= (old('jurusan') == 'OTKP') ? 'selected' : ''; ?>>Otomatisasi dan Tata Kelola Perkantoran</option>
						<option value="RPL" <?= (old('jurusan') == 'RPL') ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
					</select>
					<div class="invalid-feedback">
						<?= session('errors.jurusan') ?>
					</div>

					<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>