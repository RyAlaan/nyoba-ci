<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Unique string ID
            ],
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Match the size of products.id
            ],
            'quantity' => [
                'type' => 'INT',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'NO ACTION'); // Ensure consistency here
        $this->forge->createTable('order_items');
    }


    public function down()
    {
        $this->forge->dropTable('order_items');
    }
}
