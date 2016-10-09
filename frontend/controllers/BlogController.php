<?php
/**
 * Created by PhpStorm.
 * User: chentsu
 * Date: 26.09.2016
 * Time: 17:10
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Blog controller
 */
class BlogController extends Controller
{
    public $layout = 'blog.php';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index',[
            'title'=>'YII2 HW'
        ]);
    }

}
