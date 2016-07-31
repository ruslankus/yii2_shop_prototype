<?php

use yii\db\Migration;

class m160731_162908_Menu extends Migration
{
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
            'order' => $this->smallInteger(),
        ]);

        $this->batchInsert('menu', ['label', 'order'], [

            ['main', ''],
            ['catalog', ''],
            ['contacts', '']
        ]);
    }

    public function down()
    {
        $this->dropTable('menu');
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
