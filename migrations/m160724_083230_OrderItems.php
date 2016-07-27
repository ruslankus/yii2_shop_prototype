<?php

use yii\db\Migration;

class m160724_083230_OrderItems extends Migration
{
    public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey('10'),
            'order_id' => $this->integer(10)->unsigned()->notNull(),
            'product_id' => $this->integer(10)->unsigned()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'qty_item' => $this->integer(11)->notNull(),
            'sum_item' => $this->float()

        ]);
    }

    public function down()
    {
        $this->dropTable('order_items');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
