<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSppTable extends Migration
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
			'tahun' => [
				'type' => 'varchar',
				'constraint' => 8,
			],
			'nominal' => [
				'type' => 'bigint',
				'constraint' => 20,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('spp');
	}

	public function down()
	{
        //
	}
}
