<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Tambah Tagihan</h2>
			</div>
		</div>
		<!-- end col -->
		<div class="col-md-6">
			<div class="breadcrumb-wrapper mb-30">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="<?= base_url('/pembayaran'); ?>">Tagihan</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah Tagihan
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
			<form action="<?= base_url('/pembayaran'); ?>" method="post">
				<div class="input-style-1">
					<label for="nisn" class="mt-3">NISN <span class="text-danger">*</span></label>
					<select name="nisn" id="nisn" class="form-control <?php if(session('errors.nisn')) : ?>is-invalid<?php endif ?>">
						<option value="" <?= (old('nisn') == '') ? 'selected' : ''; ?>>-- Pilih NISN --</option>
						<?php foreach ($data['siswa'] as $siswa): ?>
							<option value="<?= $siswa['nisn']; ?>">
								<?= $siswa['nisn'] . ' - ' . $siswa['nama'] . ' - ' . $siswa['tahun']; ?>
							</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= session('errors.nisn') ?>
					</div>

					<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>