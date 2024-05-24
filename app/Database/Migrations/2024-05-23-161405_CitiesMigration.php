<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CitiesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'city_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'city_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'state_id' => [
                'type'      => 'INT',
                'constraint'=> 10,
            ],
        ]);
        $this->forge->addKey('city_id', true);
        $this->forge->createTable('tbl_cities');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_cities');
    }
}
