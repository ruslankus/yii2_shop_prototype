<?php

use yii\db\Migration;

class m160801_094344_BlocksType extends Migration
{
    public function up()
    {
        $this->createTable('blocks_types', [
            'id' => $this->primaryKey('10'),
            'label' => $this->string(),
        ]);

        $this->batchInsert('blocks_types', ['label'], [

            ['html'],
            ['form'],
            ['widget']
        ]);
    }

    public function down()
    {
        $this->dropTable('blocks_types');
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
