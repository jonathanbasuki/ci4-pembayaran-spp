<?= $this->extend('templates/base_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="title-wrapper pt-30">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="titlemb-30">
				<h2><?= $data['section']; ?></h2>
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
							<?= $data['section']; ?>
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
				<?php if (count($data['pembayaran']) == 0): ?>
					<div class="alert-box orange-alert mb-0">
						<div class="alert">
							<p class="text-medium">
								<?php if (in_groups('admin') || in_groups('petugas')) {
									echo "Belum ada tagihan yang lunas.";
								} else {
									echo "Belum ada tagihan.";
								} ?>
							</p>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="table-wrapper table-responsive">

					<?php if (count($data['pembayaran']) > 0): ?>
						<?php if (in_groups('admin')): ?>
							<button id="print-toggle" class="main-btn primary-btn square-btn btn-hover mb-3"><i class="lni lni-printer"></i> Cetak</button>
						<?php endif; ?>
						
						<table class="table mt-3">
							<thead>
								<tr>
									<th><h6>Tahun Pelajaran</h6></th>
									<th><h6>Nama Siswa</h6></th>
									<th><h6>NISN</h6></th>
									<th><h6>Tanggal Pembayaran</h6></th>
									<th><h6>Nominal</h6></th>
									<th><h6>Status</h6></th>
								</tr>
								<!-- end table row-->
							</thead>
							<tbody>
								<?php foreach ($data['pembayaran'] as $row): ?>
									<tr>
										<td>
											<p><?= $row['tahun']; ?></p>
										</td>
										<td>
											<p><?= $row['nama']; ?></p>
										</td>
										<td>
											<p><?= $row['nisn']; ?></p>
										</td>
										<td>
											<p><?= $row['tanggal']; ?></p>
										</td>
										<td>
											<p>Rp. <?= number_format($row['nominal'], 0, ',', '.'); ?></p>
										</td>
										<td>
											<p>
												<span class="status-btn <?= ($row['status'] == 'Belum Lunas') ? 'orange-btn' : 'success-btn'; ?>"><?= $row['status']; ?></span>
											</p>
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

<script>
	const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
	const overlay = document.querySelector(".overlay");
	const mainWrapper = document.querySelector(".main-wrapper");
	const printToggleButton = document.querySelector("#print-toggle");
	const menuToggleButtonIcon = document.querySelector("#menu-toggle i");

	printToggleButton.addEventListener("click", () => {
		sidebarNavWrapper.classList.add("active");
		overlay.classList.add("active");
		mainWrapper.classList.add("active");

		if (document.body.clientWidth > 1200) {
			if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
				menuToggleButtonIcon.classList.remove("lni-chevron-left");
				menuToggleButtonIcon.classList.add("lni-menu");
			} 
		} else {
			if (menuToggleButtonIcon.classList.contains("lni-chevron-left")) {
				menuToggleButtonIcon.classList.remove("lni-chevron-left");
				menuToggleButtonIcon.classList.add("lni-menu");
			}
		}

		print();
	});
</script>

<?= $this->endSection(); ?>