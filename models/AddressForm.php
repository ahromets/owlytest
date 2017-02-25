<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\Html;

/**
 * Class AddressForm
 * @package app\models
 */
class AddressForm extends Model
{
    public $name;
    public $country_id;
    public $city_id;
    public $street;
    public $building;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'country_id', 'city_id', 'street', 'building'], 'required'],
            [['country_id'], 'integer'],
            [['city_id'], 'integer', 'message' => 'Please first select the country'],
            [['name'], 'string', 'length' => [2,255]],
            [['building'], 'string', 'max' => 10],
            [['street'], 'string', 'max' => 240],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'country_id' => 'Country',
            'city_id' => 'City',
            'street' => 'Street',
            'building' => 'Building',
        ];
    }

    public function saveAddress()
    {
        $address = new Address();

        $address->name = Html::encode($this->name);
        $address->country_id = Html::encode($this->country_id);
        $address->city_id = Html::encode($this->city_id);
        $address->address = Html::encode($this->street) . ' ' . Html::encode($this->building);

        return $address->save();
    }
}
