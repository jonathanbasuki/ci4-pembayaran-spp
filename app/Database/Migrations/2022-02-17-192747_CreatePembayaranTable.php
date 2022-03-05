<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nisn' => [
				'type' => 'char',
				'constraint' => 10,
			],
			'tanggal' => [
				'type' => 'datetime',
			],
			'tahun_spp' => [
				'type' => 'varchar',
				'constraint' => 10,
			],
			'biaya' => [
				'type' => 'bigint',
				'constraint' => 20,
			],
			'id_spp' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('nisn', 'siswa', 'nisn', 'CASCADE');
		$this->forge->addForeignKey('id_spp', 'spp', 'id', 'CASCADE');
		$this->forge->createTable('pembayaran');
	}

	public function down()
	{
        //
	}
}
