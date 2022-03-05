<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Edit SPP</h2>
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
							Edit SPP
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
			<form action="<?= base_url('/spp/' . $data['spp']['id']); ?>" method="post">
				<input type="hidden" name="_method" value="PUT">

				<div class="input-style-1">
					<label for="tahun">Tahun</label>
					<select name="tahun" id="tahun" class="form-control <?php if(session('errors.tahun')) : ?>is-invalid<?php endif ?>">
						<option value="" <?= ($data['spp']['tahun'] == '') ? 'selected' : ''; ?>>-- Pilih Tahun --</option>
						<option value="<?= date('Y') - 1 . '/' . date('Y'); ?>" <?= ($data['spp']['tahun'] == date('Y') - 1 . '/' . date('Y')) ? 'selected' : ''; ?>>
							<?= date('Y') - 1 . '/' . date('Y'); ?>
						</option>
						<option value="<?= date('Y') . '/' . date('Y') + 1; ?>" <?= ($data['spp']['tahun'] == date('Y') . '/' . date('Y') + 1) ? 'selected' : ''; ?>>
							<?= date('Y') . '/' . date('Y') + 1; ?>
						</option>
						<option value="<?= date('Y') + 1 . '/' . date('Y') + 2; ?>" <?= ($data['spp']['tahun'] == date('Y') + 1 . '/' . date('Y') + 2) ? 'selected' : ''; ?>>
							<?= date('Y') + 1 . '/' . date('Y') + 2; ?>
						</option>
					</select>
					<div class="invalid-feedback">
						<?= session('errors.tahun') ?>
					</div>

					<label for="nominal" class="mt-3">Nominal</label>
					<input type="number" name="nominal" id="nominal" class="form-control <?php if(session('errors.nominal')) : ?>is-invalid<?php endif ?>" value="<?= $data['spp']['nominal']; ?>" placeholder="Rp.">
					<div class="invalid-feedback">
						<?= session('errors.nominal') ?>
					</div>

					<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Simpan Perubahan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>