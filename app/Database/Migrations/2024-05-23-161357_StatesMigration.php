<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'state_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'country_id' => [
                'type'      => 'INT',
                'constraint'=> 10,
            ],
        ]);
        $this->forge->addKey('state_id', true);
        $this->forge->createTable('tbl_states');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_states');
    }
}
