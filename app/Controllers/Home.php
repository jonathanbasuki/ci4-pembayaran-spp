<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'SPP Sang Juara',
		];

		return view('index', ['data' => $data]);
	}

	public function dashboard()
	{
		if (in_groups('admin')) {
			$data = [
				'title' => 'Dashboard Admin | SPP Sang Juara',
			];

			return view('admin/index', ['data' => $data]);
		}

		if (in_groups('petugas')) {
			$data = [
				'title' => 'Dashboard Petugas | SPP Sang Juara',
			];

			return view('petugas/index', ['data' => $data]);
		}

		$data = [
			'title' => 'Dashboard Siswa | SPP Sang Juara',
		];

		return view('user/index', ['data' => $data]);
		
	}

	public function history()
	{
		if (in_groups('admin')) {
			$title = 'Laporan Pembayaran | SPP Sang Juara';
			$section = 'Laporan Pembayaran';
			$nisn = null;
			$status = 'Lunas';
		} else if (in_groups('petugas')) {
			$title = 'Riwayat Pembayaran | SPP Sang Juara';
			$section = 'Riwayat Pembayaran';
			$nisn = null;
			$status = 'Lunas';
		} else {
			$title = 'Tagihan SPP Saya | SPP Sang Juara';
			$section = 'Tagihan SPP';
			$nisn = user()->nisn;
			$status = null;
		}

		$data = [
			'title' => $title,
			'section' => $section,
			'pembayaran' => $this->pembayaranModel->getPembayaran($nisn, $status)->getResultArray(),
		];

		return view('riwayat', ['data' => $data]);
	}
}
