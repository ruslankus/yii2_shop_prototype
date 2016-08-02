<?php

use yii\db\Migration;

class m160801_072010_PagesBlocksTrl extends Migration
{
    public function up()
    {
        $this->createTable('pages_blocks_trl', [
            'id' => $this->primaryKey('10'),
            'block_id' => $this->integer(10)->unsigned()->notNull(),
            'language_id' => $this->integer()->unsigned()->notNull(),
            'content' => $this->text(),
            'order' => $this->smallInteger()
        ]);

        $this->batchInsert('pages_blocks_trl', ['block_id', 'language_id', 'content', 'order'], [

            [1, 1, 'Sales',''],
            [1, 2, 'Акции', ''],
            [2, 1, 'Content',''],
            [2, 2, 'Контент', ''],
            [3, 1, 'Widget', ''],
            [3, 2, 'Виджет',''],
            [4, 1, 'Content-Shop',''],
            [4, 2, "Конент магазина", ''],
            [5, 1, 'Contects-content', ''],
            [5, 2, 'Контент - контактов' , '']

        ]);
    }

    public function down()
    {
        $this->dropTable('pages_blocks_trl');
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
