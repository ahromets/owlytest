<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m170224_181759_create_country_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->batchInsert('country', ['name'], [
            ['name' => 'Ukraine'],
            ['name' => 'Italy'],
            ['name' => 'Germany'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('country');
    }
}
