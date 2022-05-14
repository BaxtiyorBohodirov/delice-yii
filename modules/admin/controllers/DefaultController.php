<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()

    {
        $this->layout="@vendor/hail812/yii2-adminlte3/src/views/layout/main";
        return $this->render('index');
    }
}
