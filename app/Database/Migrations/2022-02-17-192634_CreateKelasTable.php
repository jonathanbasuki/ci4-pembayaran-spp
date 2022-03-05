<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKelasTable extends Migration
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
			'kelas' => [
				'type' => 'varchar',
				'constraint' => 10,
			],
			'jurusan' => [
				'type' => 'varchar',
				'constraint' => 50,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('kelas');
	}

	public function down()
	{
        //
	}
}
