<?php

use yii\db\Migration;

class m160731_095612_languages extends Migration
{
    public function up()
    {

        $this->createTable('languages', [
            'id' => $this->primaryKey('10'),
            'url' => $this->string('2')->notNull(),
            'locale' => $this->string('6')->notNull(),
            'name' => $this->string('20')->notNull(),
            'default' => $this->boolean()->notNull()->defaultValue(false),
            'date_update' => $this->dateTime(),
            'date_create' => $this->dateTime(),

        ]);

        $this->batchInsert('languages', ['url', 'locale', 'name', 'default', 'date_update', 'date_create'], [
            ['en', 'en-EN', 'English', true, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
            ['ru', 'ru-RU', 'Русский', false, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
        ]);
    }

    public function down()
    {
        $this->dropTable('languages');
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
