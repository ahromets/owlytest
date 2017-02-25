<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m170224_181809_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-city-country_id', 'city', 'country_id', 'country', 'id', 'CASCADE');

        $this->batchInsert('city', ['name', 'country_id'], [
            ['name' => 'Sumy', 'country_id' => 1],
            ['name' => 'Kyiv', 'country_id' => 1],
            ['name' => 'Kharkiv', 'country_id' => 1],
            ['name' => 'Dnipro', 'country_id' => 1],
            ['name' => 'Odessa', 'country_id' => 1],
            ['name' => 'Rome', 'country_id' => 2],
            ['name' => 'Milan', 'country_id' => 2],
            ['name' => 'Naples', 'country_id' => 2],
            ['name' => 'Turin', 'country_id' => 2],
            ['name' => 'Palermo', 'country_id' => 2],
            ['name' => 'Berlin', 'country_id' => 3],
            ['name' => 'Hannover', 'country_id' => 3],
            ['name' => 'Hamburg', 'country_id' => 3],
            ['name' => 'Dortmund', 'country_id' => 3],
            ['name' => 'Leipzig', 'country_id' => 3],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-city-country_id', 'city');
        $this->dropTable('city');
    }
}
