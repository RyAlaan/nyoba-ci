<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'DEFAULT' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('cart_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('carts');
    }


    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
