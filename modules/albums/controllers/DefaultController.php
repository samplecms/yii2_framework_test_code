<?php

namespace app\modules\albums\controllers;

use yii\web\Controller;

/**
 * Default controller for the `albums` module
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
}
