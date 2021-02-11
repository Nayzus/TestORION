<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 07.02.2021.
 * Time: 18:05.
 **/
namespace app\models;

use app\classes\Routing;
use app\View;
use JsonException;

class CamerasModel
{
    protected array $cameras;
    protected string $getCamerasUrl = 'https://orionnet.online/api/v2/cameras/public';

    public int $postCount;
    public int $postPerPage = 12;
    public int $currentPage;

    /**
     * CamerasModel constructor.
     * @param int $city_id //id города
     */
    public function __construct($city_id = 0)
    {
        if ($city_id !== 0) {
            $this->getCamerasUrl .= '?city_id='.$city_id;
        }
        $this->cameras = $this->getCameras();
    }

    /**
     * Получаем список камер
     */
    public function getCameras(): array
    {
        // Получаем список камер по API
        $getCameras = file_get_contents($this->getCamerasUrl);

        // JSON->Array
        try {
            $getCameras = json_decode($getCameras, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }

        // Подсчитываем число элементов в ответе
        $this->postCount = count($getCameras);

        return $getCameras;
    }

    /**
     * Получаем кол-во страниц, округленное в большую сторону.
     * @return int
     */
    public function getPageCount(): int
    {
        return ceil($this->postCount / $this->postPerPage);
    }

    /**
     * Получаем выборку записей
     * @param int $page
     * @return array
     */
    public function getPosts(int $page): array
    {
        $this->currentPage = $page;
        // Берем выборку записей с учетом страницы.
        $postStart = $page === 1 ? 0 : --$page*$this->postPerPage - 1;
        $output = array_slice($this->cameras, $postStart, $this->postPerPage, true);

        if (empty($output)) {
            View::page404();
        }

        return $output;
    }

}