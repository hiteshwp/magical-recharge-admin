<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CountriesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'country_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'country_shortname' => [
                'type'       => 'VARCHAR',
                'constraint' => '3',
            ],
            'country_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'country_phonecode' => [
                'type'      => 'INT',
                'constraint'=> 10,
            ],
        ]);
        $this->forge->addKey('country_id', true);
        $this->forge->createTable('tbl_countries');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_countries');
    }
}
