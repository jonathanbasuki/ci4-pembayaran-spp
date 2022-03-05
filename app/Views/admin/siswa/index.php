<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2>Data Siswa</h2>
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
							Data Siswa
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
				<a href="<?= base_url('/siswa/new'); ?>" class="main-btn primary-btn square-btn btn-hover mb-3"><i class="lni lni-circle-plus"></i> Tambah Siswa</a>

				<?php if (count($data['siswa']) == 0): ?>
					<div class="alert-box orange-alert mb-0">
						<div class="alert">
							<p class="text-medium">
								Belum ada siswa.
							</p>
						</div>
					</div>
				<?php endif; ?>

				<div class="table-wrapper table-responsive">
					<?php if (count($data['siswa']) > 0): ?>
						<table class="table mt-3">
							<thead>
								<tr>
									<th><h6>Nama Siswa</h6></th>
									<th><h6>NISN</h6></th>
									<th><h6>NIS</h6></th>
									<th><h6>Kelas</h6></th>
									<th><h6>Tahun Pelajaran</h6></th>
									<th><h6>Alamat</h6></th>
									<th><h6>No. Telp</h6></th>
									<th><h6></h6></th>
								</tr>
								<!-- end table row-->
							</thead>
							<tbody>
								<?php foreach ($data['siswa'] as $row): ?>
									<tr>
										<td>
											<p><?= $row['nama']; ?></p>
										</td>
										<td>
											<p><?= $row['nisn']; ?></p>
										</td>
										<td>
											<p><?= $row['nis']; ?></p>
										</td>
										<td>
											<p><?= $row['kelas'] . ' - ' . $row['jurusan']; ?></p>
										</td>
										<td>
											<p><?= $row['tahun']; ?></p>
										</td>
										<td>
											<p><?= $row['alamat']; ?></p>
										</td>
										<td>
											<p><?= $row['telp']; ?></p>
										</td>
										<td>
											<div class="action">
												<a title="Edit Siswa" href="<?= base_url('/siswa/' . $row['nisn'] . '/edit'); ?>" class="text-orange mx-2">
													<i class="lni lni-pencil fs-4"></i>
												</a>
												<form action="<?= base_url('/siswa/' . $row['nisn']); ?>" method="post">
													<input type="hidden" name="_method" value="DELETE">
													<button title="Hapus Siswa" type="submit" class="text-danger p-0">
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