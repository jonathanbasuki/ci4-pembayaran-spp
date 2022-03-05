<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Tambah SPP</h2>
			</div>
		</div>
		<!-- end col -->
		<div class="col-md-6">
			<div class="breadcrumb-wrapper mb-30">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="<?= base_url('/spp'); ?>">Data SPP</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah SPP
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
			<form action="<?= base_url('/spp'); ?>" method="post">
				<div class="input-style-1">
					<label for="tahun">Tahun</label>
					<select name="tahun" id="tahun" class="form-control <?php if(session('errors.tahun')) : ?>is-invalid<?php endif ?>">
						<option value="" <?= (old('tahun') == '') ? 'selected' : ''; ?>>-- Pilih Tahun --</option>
						<option value="<?= date('Y') - 1 . '/' . date('Y'); ?>" <?= (old('tahun') == date('Y') - 1 . '/' . date('Y')) ? 'selected' : ''; ?>>
							<?= date('Y') - 1 . '/' . date('Y'); ?>
						</option>
						<option value="<?= date('Y') . '/' . date('Y') + 1; ?>" <?= (old('tahun') == date('Y') . '/' . date('Y') + 1) ? 'selected' : ''; ?>>
							<?= date('Y') . '/' . date('Y') + 1; ?>
						</option>
						<option value="<?= date('Y') + 1 . '/' . date('Y') + 2; ?>" <?= (old('tahun') == date('Y') + 1 . '/' . date('Y') + 2) ? 'selected' : ''; ?>>
							<?= date('Y') + 1 . '/' . date('Y') + 2; ?>
						</option>
					</select>
					<div class="invalid-feedback">
						<?= session('errors.tahun') ?>
					</div>

					<label for="nominal" class="mt-3">Nominal</label>
					<input type="number" name="nominal" id="nominal" class="form-control <?php if(session('errors.nominal')) : ?>is-invalid<?php endif ?>" value="<?= old('nominal'); ?>" placeholder="Rp.">
					<div class="invalid-feedback">
						<?= session('errors.nominal') ?>
					</div>

					<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>