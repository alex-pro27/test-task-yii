<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 18.04.2018
 * Time: 18:41
 */

namespace app\controllers;


use yii\web\Controller;

class SiteController extends Controller
{
    public function actionError($message) {
        return $this->render('/common/error', ['message' => $message, 'title' => 'Error']);
    }
}