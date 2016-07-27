<?php

use yii\db\Migration;
use yii\db\Schema;

class m160716_090235_Categories extends Migration
{
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey('10'),
            'parent_id' => $this->integer('10')->unsigned()->defaultValue(0),
            'name' => $this->string('255')->notNull(),
            'keywords' => $this->string('255'),
            'description' => $this->string('255')

        ]);


        $this->batchInsert('categories',
            ['parent_id','name','keywords','description'],
            [
                ['parent_id' => 0, 'name'=>'Sportwear', 'keywords'=> null,'description'=> null],
                ['parent_id' => 0, 'name'=>'Mens', 'keywords'=> null,'description'=> null],
                ['parent_id' => 0, 'name'=>'Woman', 'keywords'=> null,'description'=> null],
                ['parent_id' => 1, 'name'=>'Nike', 'keywords'=> "Nike, keywords",'description'=> "Nike, description"],
                ['parent_id' => 1, 'name'=>'Under Armour', 'keywords'=> null,'description'=> null],
                ['parent_id' => 1, 'name'=>'Adidas', 'keywords'=> null,'description'=> null],
                ['parent_id' => 1, 'name'=>'Puma', 'keywords'=> null,'description'=> null],
                ['parent_id' => 1, 'name'=>'ASICS', 'keywords'=> null,'description'=> null],
                ['parent_id' => 2, 'name'=>'Fendi', 'keywords'=> null,'description'=> null],
                ['parent_id' => 2, 'name'=>'Guess', 'keywords'=> null,'description'=> null],
                ['parent_id' => 2, 'name'=>'Valentino', 'keywords'=> null,'description'=> null]

            ]
        );
    }

    public function down()
    {
        $this->dropTable('categories');
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
