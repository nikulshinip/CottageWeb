<?php
//формирование главной страницы сайта
function indexAction($smarty){
    include_once '../library/floorFunction.php';

    $smarty->assign('title', 'cottage-первый этаж');
    $smarty->assign('str', 1);
    $smarty->assign('classLine', 'menu_small_line');
    $smarty->assign('leftLine', '0px');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/floor.css">
                            <link rel="stylesheet" type="text/css" href="/css/floor1.css">');
    $smarty->assign('script', '<script type="text/javascript" src="/js/floor1.js"></script>');

    $t_room = getTemperatur(4);
    $t_stairs = getTemperatur(5);
    $t_terrace = getTemperatur(6);
    $t_out = getTemperatur(7);
    $t_cook = getTemperatur(8);
    $t_bathRoom = getTemperatur(9);

    $smarty->assign('t_room', $t_room);
    $smarty->assign('t_stairs', $t_stairs);
    $smarty->assign('t_terrace', $t_terrace);
    $smarty->assign('t_out', $t_out);
    $smarty->assign('t_cook', $t_cook);
    $smarty->assign('t_bathRoom', $t_bathRoom);

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'floor');
    loadTemplate($smarty, 'footer');
}

//обнавление параметров
function updateAction(){
    include_once '../library/floorFunction.php';
    $json = array('t_room' => getTemperatur(4),
                  't_stairs' => getTemperatur(5),
                  't_terrace' => getTemperatur(6),
                  't_out' => getTemperatur(7),
                  't_cook' => getTemperatur(8),
                  't_bathRoom' => getTemperatur(9));
    $json = json_encode($json);
    echo $json;
    return TRUE;
}

function infoAction(){
  phpinfo();
}