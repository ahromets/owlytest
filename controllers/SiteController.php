<?php

namespace app\controllers;

use app\models\Address;
use app\models\AddressForm;
use app\models\City;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage
     * @return string
     */
    public function actionIndex()
    {
        $data = Address::getAll(3);

        return $this->render('index', [
            'addresses' => $data['addresses'],
            'pagination' => $data['pagination'],
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new AddressForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->saveAddress()) {
                Yii::$app->getSession()->setFlash('success', 'Your address has been added successfully');
                return $this->redirect(Url::home());
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $address = Address::findOne($id);
        $fullAddress = $address->address . ', ' . $address->city->name . ', ' . $address->country->name;

        return $this->render('view', [
            'address' => $address,
            'fullAddress' => $fullAddress,
        ]);
    }

    /**
     * Returns cities list for addressform dropdown list
     * @param $id
     */
    public function actionCitiesList($id)
    {
        $cities = City::find()
            ->where(['country_id' => intval($id)])
            ->all();

        if ($cities) {
            foreach ($cities as $city) {
                echo "<option value='" . $city->id . "'>" . $city->name . "</option>";
            }
        } else {
            echo "<option> - </option>";
        }
    }
}
