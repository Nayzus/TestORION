<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 04.02.2021.
 * Time: 15:02.
 **/
namespace app\controllers;

use app\Controllers;
use app\models\CamerasModel;
use app\View;

class IndexController extends Controllers
{

    public function index():void
    {
        $cameras = new CamerasModel();
        $view = new View();

        $view->setData('cameras', $cameras->getPosts(1));
        $view->setData('pages', array(
            'count'=>$cameras->getPageCount(),
            'current'=>$cameras->currentPage,
            'url'=>'/'
        ));

        $view->render('main.php');

    }

    /**
     * Доступные параметры передаваемые роутером
     * @param: $this->params['@page_num']
     */
    public function pages():void {
        $cameras = new CamerasModel();
        $view = new View();

        $view->setData('cameras', $cameras->getPosts( $this->params['page_num']));
        $view->setData('pages', array(
            'count'=>$cameras->getPageCount(),
            'current'=>$cameras->currentPage,
            'url'=>'/'
        ));

        $view->render('main.php');
    }
}