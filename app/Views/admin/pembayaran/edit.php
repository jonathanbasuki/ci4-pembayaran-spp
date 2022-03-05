<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Edit Tagihan</h2>
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
							Edit Tagihan
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
			<?php foreach ($data['tagihan'] as $tagihan): ?>
				<form action="<?= base_url('/pembayaran/' . $tagihan['id']); ?>" method="post">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="tanggal" value="<?= $tagihan['tanggal']; ?>">

					<div class="input-style-1">
						<label for="nisn" class="mt-3">NISN <span class="text-danger">*</span></label>
						<select id="nisn" class="form-control" disabled>
							<option value="<?= $tagihan['nisn']; ?>" selected>
								<?= $tagihan['nisn'] . ' - ' . $tagihan['nama'] . ' - ' . $tagihan['tahun']; ?>
							</option>
						</select>

						<label for="status" class="mt-3">Status Pembayaran <span class="text-danger">*</span></label>
						<select name="status" id="status" class="form-control">
							<option value="" <?= ($tagihan['status'] == '') ? 'selected' : ''; ?>>
								-- Pilih Status Pembayaran --
							</option>
							<option value="Belum Lunas" <?= ($tagihan['status'] == 'Belum Lunas') ? 'selected' : ''; ?>>
								Belum Lunas
							</option>
							<option value="Lunas" <?= ($tagihan['status'] == 'Lunas') ? 'selected' : ''; ?>>
								Lunas
							</option>
						</select>

						<button type="submit" class="main-btn primary-btn btn-hover float-end mt-3">Simpan Perubahan</button>
					</div>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>