<?php

use yii\db\Migration;

class m160724_083202_Orders extends Migration
{
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey('10'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'qty' => $this->integer(10),
            'sum' => $this->float(),
            'status' => $this->boolean()->defaultValue(false),
            'name' => $this->string('255')->notNull(),
            'email' => $this->string('255')->notNull(),
            'phone' => $this->string('255')->notNull(),
            'address' => $this->string('255')->notNull()

        ]);

    }

    public function down()
    {
        $this->dropTable('orders');
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
