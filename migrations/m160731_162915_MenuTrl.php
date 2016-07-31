<?php

use yii\db\Migration;

class m160731_162915_MenuTrl extends Migration
{
    public function up()
    {
        $this->createTable('menu_trl', [
            'id' => $this->primaryKey('10'),
            'lang_id' => $this->integer()->unsigned()->notNull(),
            'menu_id' => $this->integer()->unsigned()->notNull(),
            'menu_text' => $this->string(),
        ]);



        $this->batchInsert('menu_trl', ['lang_id', 'menu_id' , 'menu_text'], [
            [1, 1, 'Main'],
            [2, 1, 'Главная'],
            [1,2, 'Catalog'],
            [2, 2, 'Каталог'],
            [1, 3, 'Contacts'],
            [2, 3, 'Контакты']
        ]);
    }

    public function down()
    {
       $this->dropTable('menu_trl');
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
