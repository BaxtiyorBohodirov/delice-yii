<?php

namespace app\modules\adminpanel\controllers;

use yii\web\Controller;

/**
 * Default controller for the `adminpanel` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin()
    {
        return $this->render('login');
    }
}
