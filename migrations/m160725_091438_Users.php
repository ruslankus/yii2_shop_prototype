<?php

use yii\db\Migration;

class m160725_091438_Users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey('10'),
            'username' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)


        ]);

        $this->batchInsert('users',
            ['username','password','auth_key'],
            [
                ['admin', '$2y$13$aEn58tAKyUcsvgyjm5CtDeOkSXu.XcKqLQ.4ZylWk3.nsGQ1uL5km', null ]
            ]
        );

    }

    public function down()
    {
       $this->dropTable('users');
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
