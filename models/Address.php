<?php

namespace app\models;

use yii\data\Pagination;
use yii\db\ActiveRecord;

/**
 * Class Address
 * @package app\models
 */
class Address extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Returns addresses list with pagination
     * @param int $pageSize
     * @return mixed
     */
    public static function getAll($pageSize = 5)
    {
        $query = Address::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('id DESC')
            ->all();

        $data['addresses'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }
}
