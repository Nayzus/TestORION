<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 07.02.2021.
 * Time: 17:49.
 **/
namespace app;

abstract class Controllers
{
    public array $params;

    public function __construct($action, $params)
    {
        $this->params = $params;
        $this->$action();
    }

    /*
     * Вызов экшена по умолчанию
     */
    protected function index():void {}

    /*
     * Рендер
     */
    public function render():void {}

}