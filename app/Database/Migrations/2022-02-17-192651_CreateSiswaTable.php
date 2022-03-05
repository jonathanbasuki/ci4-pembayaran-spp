<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nisn' => [
				'type' => 'char',
				'constraint' => 10,
			],
			'nis' => [
				'type' => 'char',
				'constraint' => 8,
			],
			'alamat' => [
				'type' => 'text',
			],
			'telp' => [
				'type' => 'varchar',
				'constraint' => 13,
			],
			'id_kelas' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
			],
			'id_spp' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
			],
		]);

		$this->forge->addKey('nisn', true);
		$this->forge->addForeignKey('id_kelas', 'kelas', 'id', 'CASCADE');
		$this->forge->addForeignKey('id_spp', 'spp', 'id', 'CASCADE');
		$this->forge->createTable('siswa');
	}

	public function down()
	{
        //
	}
}
