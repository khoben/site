<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$img_folder = '/media/';

// LUL
$default_chars = ['Масса','Высота выгрузки', 'Объем ковша',
                    'Грузоподъемность', 'Мощность двигателя',
                    'Тип шин', 'Тип двигателя'];

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$app->get('/', function () use ($app) {
    /**@var $conn Connection */
    $conn = $app['db'];

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

$app->get('/edit/car/{id}',function ($id) use($app){

    $pageName = 'Редактирование';
    $btnName = 'Сохранить';

    $conn = $app['db'];
    // По ИД получим экземляр car
    $car = $conn->fetchAssoc("SELECT
    mark.name as mark,
    mark.ID as ID_mark,
    category.name as category,
    category.ID as ID_category,
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
    $exist_mods = $conn->fetchAll("SELECT
    characteristicvalue.value as value,
    characteristicvalue.unit as unit,
    characteristicname.name as name,
    characteristicname.ID as ID_char_name
    FROM modification
    INNER JOIN car
        ON modification.ID_car = car.ID
    INNER JOIN characteristicvalue
        ON characteristicvalue.ID_modification = modification.ID
    INNER JOIN characteristicname
        ON characteristicvalue.ID_char_name = characteristicname.ID
    WHERE car.ID = ?", [$id]);

    $marks = $conn->fetchAll("SELECT
    name, ID
    FROM mark");

    $categories = $conn->fetchAll("SELECT
    name, ID
    FROM category");

    $mods = $conn->fetchAll("SELECT
    ID as ID_char_name,
    name as name
    FROM characteristicname");

    return $app['twig']->render('edit-page.twig',['exist_mods' => $exist_mods,'categories' => $categories,'marks' => $marks,'mods' => $mods,'pageName' => $pageName, 'btnName' => $btnName, 'car' => $car,'img_folder' => $GLOBALS['img_folder']]);
});

$app->get('/add',function () use($app){

    $pageName = 'Добавление';
    $btnName = 'Добавить';

    $conn = $app['db'];

    $marks = $conn->fetchAll("SELECT
    name, ID
    FROM mark");

    $categories = $conn->fetchAll("SELECT
    name, ID
    FROM category");

    $mods = $conn->fetchAll("SELECT
    ID as ID_char_name,
    name as name
    FROM characteristicname");

    return $app['twig']->render('edit-page.twig', [ 'mods' => $mods ,'categories' => $categories,'marks' => $marks,'pageName' => $pageName, 'btnName' => $btnName]);
});

$app->post('/edit/car/{id}', function (Request $request, $id) use($app) { 

    $file = $request->files->get('img_path'); 

    // could throw a Symfony\Component\HttpFoundation\File\Exception\FileException 
    // will overwrite existing file 

    $conn = $app['db'];

    if ($file){
        $file->move(__DIR__.'/../web/media/item_pics', $file->getClientOriginalName()); 
        $update = $conn->prepare("UPDATE car set img_path = :img_path, name=:name,
                                ID_mark = :ID_mark, ID_category = :ID_category where id=:id");
        $update->bindParam(':img_path', $img_path);
        $img_path = '/item_pics/' . $file->getClientOriginalName();
    }
    else{
        $update = $conn->prepare("UPDATE car set name=:name, ID_mark = :ID_mark, ID_category = :ID_category  where id=:id");
    }

    $update->bindParam(':id', $id);
    $update->bindParam(':name', $name);
    $update->bindParam(':ID_category', $category);
    $update->bindParam(':ID_mark', $mark);

    $name = $request->get('name');
    $category = $request->get('category');
    $mark = $request->get('mark');
    $update->execute();

    $mod = $conn->fetchAssoc("SELECT ID
    FROM modification where ID_car = ?",[$id]);

    $id_mod = null;

    if (!$mod) {
        $conn->insert('modification',['name' => 'Модификация для ' . $name, 'ID_car' => $id]);
        $id_mod = $conn->lastInsertId();
    }
    else{
        $id_mod = $mod['ID'];
    }

    $char_values = $conn->fetchAll("SELECT ID_char_name FROM characteristicvalue WHERE ID_modification = ?",[$id_mod]);

    $char_ids = $conn->fetchAll("SELECT ID FROM characteristicname");

    foreach ($char_ids as $char_id) {
        $new_val = $request->get($char_id['ID']);
        if (!empty($new_val)){
            $update = false;
            foreach ($char_values as $char_value) {
                if ($char_value['ID_char_name']==$char_id['ID']){
                    $update = true;
                    break;
                }
            }
            $update_or_insert = null;
            if ($update == true){
                $update_or_insert = $conn->prepare("UPDATE characteristicvalue set value = :value
                                                     WHERE ID_char_name = :ID_char_name and ID_modification = :ID_modification");
                                       
            }
            else{
                $update_or_insert = $conn->prepare("INSERT INTO characteristicvalue (ID_modification, value, ID_char_name) 
                                        VALUES(:ID_modification,:value, :ID_char_name)");
            }
            $update_or_insert->bindParam(':ID_modification', $id_mod);
            $update_or_insert->bindParam(':value', $new_val);
            $update_or_insert->bindParam(':ID_char_name', $char_id['ID']);
            $update_or_insert->execute();
        }
    }

    return $app->redirect(sprintf('/car/%s', $id));
}); 

$app->post('/add', function (Request $request) use($app) { 
    $file = $request->files->get('img_path'); 

    // could throw a Symfony\Component\HttpFoundation\File\Exception\FileException 
    // will overwrite existing file 
    
    $img_path = null;

    if ($file){
        $file->move(__DIR__.'/../web/media/item_pics', $file->getClientOriginalName()); 
        $img_path = '/item_pics/' . $file->getClientOriginalName();
    }
    

    $conn = $app['db'];
    $img_path = '/item_pics/' . $file->getClientOriginalName();
    $conn->insert('car', ['name' => $request->get('name'),
                            'img_path' => $img_path,
                            'ID_category' => $request->get('category'),
                            'ID_mark' => $request->get('mark')]);
    
    $id_new_car = $conn->lastInsertId();
    $conn->insert('modification',['name' => 'Модификация для ' . $name, 'ID_car' => $id_new_car]);
    $id_new_mod = $conn->lastInsertId();


    $char_ids = $conn->fetchAll("SELECT ID FROM characteristicname");

    foreach ($char_ids as $char_id) {
        $new_val = $request->get($char_id['ID']);
        if (!empty($new_val)){
            $conn->insert('characteristicvalue',['ID_modification' => $id_new_mod, 
            'ID_char_name' => $char_id['ID'], 'value' => $new_val]);
        }
    }

    return $app->redirect(sprintf('/car/%s', $id_new_car));
}); 

$app->get('delete/car/{id}', function ($id) use ($app) {
    /**@var $conn Connection */
    $conn = $app['db'];
    $conn->delete('car', ['id' => $id]);
    return $app->redirect('/admin');
});