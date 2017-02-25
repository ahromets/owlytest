<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m170224_181816_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'address' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-address-country_id', 'address', 'country_id', 'country', 'id', 'CASCADE');
        $this->addForeignKey('fk-address-city_id', 'address', 'city_id', 'city', 'id', 'CASCADE');

        $this->batchInsert('city', ['name', 'country_id'], [
            ['name' => 'National mining university', 'country_id' => 1, 'city_id' => 4, 'address' => 'проспект Дмитра Яворницького 19'],
            ['name' => 'Chicken Hut', 'country_id' => 1, 'city_id' => 1, 'address' => 'проспект Михайла Лушпи 7'],
            ['name' => 'Dentisti Medici Chirurghi Ed Odontoiatri Di Sipone Rodolfo', 'country_id' => 2, 'city_id' => 6, 'address' => 'Via Principe Eugenio 23'],
            ['name' => 'Deutscher Dom', 'country_id' => 3, 'city_id' => 11, 'address' => 'Gendarmenmarkt 1-2'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-address-city_id', 'address');
        $this->dropForeignKey('fk-address-country_id', 'address');
        $this->dropTable('address');
    }
}
