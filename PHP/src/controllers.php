<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$img_folder = '/media/';

$app->get('/', function () use ($app) {
    /**@var $conn Connection */
    $conn = $app['db'];
    // $cars = $conn->fetchAll('select * from car');

    $cars = $conn->fetchAll("SELECT
    mark.name,
    category.name,
    car.ID,
    car.name,
    car.img_path
    FROM car
    INNER JOIN category
      ON car.ID_category = category.ID
    INNER JOIN mark
      ON car.ID_mark = mark.ID");

    return $app['twig']->render('index.twig', ['cars' => $cars, 'img_folder' => $GLOBALS['img_folder']]);
});

$app->get('/admin', function () use ($app) {
    /**@var $conn Connection */
    $conn = $app['db'];
    $cars = $conn->fetchAll('select * from car');
    return $app['twig']->render('admin-page.twig', ['cars' => $cars, 'img_folder' => $GLOBALS['img_folder']]);
});

$app->get('/car/{id}', function ($id) use ($app) {
    /**@var $conn Connection */
    $conn = $app['db'];
    // По ИД получим экземляр car
    $car = $conn->fetchAssoc("SELECT
    mark.name as mark,
    category.name as category,
    car.ID as ID,
    car.name as name,
    car.img_path as img_path
    FROM car
    INNER JOIN category
      ON car.ID_category = category.ID
    INNER JOIN mark
      ON car.ID_mark = mark.ID
      WHERE car.ID = ?", [$id]);
    if (!$car) {
        throw new NotFoundHttpException();
    }

    // Для полученной машины найдем модификации
    $mods = $conn->fetchAll("SELECT
    characteristicvalue.value as value,
    characteristicvalue.unit as unit,
    characteristicname.name as name
    FROM modification
    INNER JOIN car
        ON modification.ID_car = car.ID
    INNER JOIN characteristicvalue
        ON characteristicvalue.ID_modification = modification.ID
    INNER JOIN characteristicname
        ON characteristicvalue.ID_char_name = characteristicname.ID
    WHERE car.ID = ?", [$id]);

    return $app['twig']->render('item-page.twig', ['car' => $car, 'mods' => $mods, 'img_folder' => $GLOBALS['img_folder']]);
});

$app->get('/edit',function () use($app){

    $pageName = 'Редактирование';
    $btnName = 'Сохранить';
    return $app['twig']->render('edit-page.twig',['pageName' => $pageName, 'btnName' => $btnName]);
});

$app->get('/add',function () use($app){

    $pageName = 'Добавление';
    $btnName = 'Добавить';
    return $app['twig']->render('edit-page.twig', ['pageName' => $pageName, 'btnName' => $btnName]);
});