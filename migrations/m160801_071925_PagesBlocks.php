<?php

use yii\db\Migration;

class m160801_071925_PagesBlocks extends Migration
{
    public function up()
    {
        $this->createTable('pages_blocks', [
            'id' => $this->primaryKey('10'),
            'page_id' => $this->integer(10)->unsigned()->notNull(),
            'type' => $this->integer()->unsigned()->notNull(),
            'label' => $this->string(),
            'order' => $this->smallInteger()
        ]);

        $this->batchInsert('pages_blocks', ['page_id', 'type', 'label', 'order'], [

            [1, 1,'sales',''],
            [1, 2, 'content', ''],
            [1, 3,'widget',''],
            [2, 2, 'content', ''],
            [3, 2, 'content', ''],
        ]);
    }

    public function down()
    {
        $this->dropTable('pages_blocks');
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
