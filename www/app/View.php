<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 07.02.2021.
 * Time: 22:03.
 **/

namespace app;


class View
{
    protected array $data;
    public const TPL_DIR =  __DIR__.'/template/';

    public function setData(string $key, array $data): void
    {
        $this->data[$key] = $data;
    }

    public function render(string $templateName):void
    {
        $templatePath = self::TPL_DIR.$templateName;
        if(file_exists($templatePath)) {
            include $templatePath;
        }

    }
    public static function page404(): void
    {
        header('HTTP/1.1 404 Not Found');
        echo '<h1>404 Not Found</h1>';
        exit();
    }
}