<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Data Kelas</h2>
			</div>
		</div>
		<!-- end col -->
		<div class="col-md-6">
			<div class="breadcrumb-wrapper mb-30">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="<?= base_url('/dashboard'); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data Kelas
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
</div>

<div class="tables-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?= view('templates/_partials/_message'); ?>
			<div class="card-style mb-30">
				<a href="<?= base_url('/kelas/new'); ?>" class="main-btn primary-btn square-btn btn-hover mb-3"><i class="lni lni-circle-plus"></i> Tambah Kelas</a>

				<?php if (count($data['kelas']) == 0): ?>
					<div class="alert-box orange-alert mb-0">
						<div class="alert">
							<p class="text-medium">
								Belum ada kelas.
							</p>
						</div>
					</div>
				<?php endif; ?>

				<div class="table-wrapper table-responsive">
					<?php if (count($data['kelas']) > 0): ?>
						<table class="table mt-3">
							<thead>
								<tr>
									<th><h6>Kelas</h6></th>
									<th><h6>Jurusan</h6></th>
									<th><h6></h6></th>
								</tr>
								<!-- end table row-->
							</thead>
							<tbody>
								<?php foreach ($data['kelas'] as $row): ?>
									<tr>
										<td>
											<p><?= $row['kelas']; ?></p>
										</td>
										<td>
											<p>
												<?php if ($row['jurusan'] == 'AKL'): ?>
													Akuntansi dan Keuangan Lembaga
												<?php endif; ?>

												<?php if ($row['jurusan'] == 'BDP'): ?>
													Bisnis Daring dan Pemasaran
												<?php endif; ?>

												<?php if ($row['jurusan'] == 'OTKP'): ?>
													Otomatisasi dan Tata Kelola Perkantoran
												<?php endif; ?>

												<?php if ($row['jurusan'] == 'RPL'): ?>
													Rekayasan Perangkat Lunak
												<?php endif; ?>
											</p>
										</td>
										<td>
											<div class="action">
												<a href="<?= base_url('/kelas/' . $row['id'] . '/edit'); ?>" class="text-orange">
													<i class="lni lni-pencil fs-4"></i>
												</a>
												<form action="<?= base_url('/kelas/' . $row['id']); ?>" method="post">
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" class="text-danger">
														<i class="lni lni-trash-can fs-4"></i>
													</button>
												</form>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
								<!-- end table row -->
							</tbody>
						</table>
						<!-- end table -->							
					<?php endif; ?>
				</div>
			</div>
			<!-- end card -->
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
</div>

<?= $this->endSection(); ?>