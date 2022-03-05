<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Tambah Siswa</h2>
			</div>
		</div>
		<!-- end col -->
		<div class="col-md-6">
			<div class="breadcrumb-wrapper mb-30">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="<?= base_url('/siswa'); ?>">Data Siswa</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah Siswa
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
			<form action="<?= base_url('/siswa'); ?>" method="post">
				<div class="input-style-1">
					<label for="nama">Nama <span class="text-danger">*</span></label>
					<input type="text" name="nama" id="nama" class="form-control <?php if(session('errors.nama')) : ?>is-invalid<?php endif ?>" value="<?= old('nama'); ?>" placeholder="Nama Siswa">
					<div class="invalid-feedback">
						<?= session('errors.nama') ?>
					</div>

					<div class="row">
						<div class="col-md-6 mt-3">
							<label for="nisn">NISN <span class="text-danger">*</span></label>
							<input type="number" name="nisn" id="nisn" class="form-control <?php if(session('errors.nisn')) : ?>is-invalid<?php endif ?>" value="<?= old('nisn'); ?>" placeholder="NISN Siswa">
							<div class="invalid-feedback">
								<?= session('errors.nisn') ?>
							</div>
						</div>
						<div class="col-md-6 mt-3">
							<label for="nis">NIS <span class="text-danger">*</span></label>
							<input type="number" name="nis" id="nis" class="form-control <?php if(session('errors.nis')) : ?>is-invalid<?php endif ?>" value="<?= old('nis'); ?>" placeholder="NIS Siswa">
							<div class="invalid-feedback">
								<?= session('errors.nis') ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="kelas" class="mt-3">Kelas Siswa <span class="text-danger">*</span></label>
							<select name="kelas" id="kelas" class="form-control <?php if(session('errors.kelas')) : ?>is-invalid<?php endif ?>">
								<option value="" <?= (old('kelas') == '') ? 'selected' : ''; ?>>-- Pilih Kelas Siswa --</option>
								<?php foreach ($data['kelas'] as $kelas): ?>
									<option value="<?= $kelas['id']; ?>" <?= (old('kelas') == $kelas['id']) ? 'selected' : ''; ?>><?= $kelas['kelas'] . ' - ' . $kelas['jurusan']; ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?= session('errors.kelas') ?>
							</div>
						</div>
						<div class="col-md-6">
							<label for="spp" class="mt-3">Tahun Pelajaran <span class="text-danger">*</span></label>
							<select name="spp" id="spp" class="form-control <?php if(session('errors.spp')) : ?>is-invalid<?php endif ?>">
								<option value="" <?= (old('spp') == '') ? 'selected' : ''; ?>>-- Pilih Tahun Pelajaran --</option>
								<?php foreach ($data['spp'] as $spp): ?>
									<option value="<?= $spp['id']; ?>" <?= (old('spp') == $spp['id']) ? 'selected' : ''; ?>><?= $spp['tahun']; ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?= session('errors.spp') ?>
							</div>
						</div>
					</div>

					<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>