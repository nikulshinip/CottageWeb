<?php

function indexAction($smarty){
    include_once '../library/boilerFunction.php';
    $smarty->assign('title', 'cottage-управление котлом');
    $smarty->assign('str', 3);
    $smarty->assign('leftLine', '388px');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/slider.css">
                            <link rel="stylesheet" type="text/css" href="/css/checkbox.css">
                            <link rel="stylesheet" type="text/css" href="/css/select.css">
                            <link rel="stylesheet" type="text/css" href="/css/cotel.css">');
    $smarty->assign('script', '<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
                               <script type="text/javascript" src="/js/cotel.js"></script>');

    $on_off_addOptions = getAddOptions(1);
    $mode = getAddOptions(2);
    $autoPower = getAddOptions(3);
    $on_off_din = getDin(1);
    $overheating = getDin(2);
    $power = getPower_dout();
    $lamp1 = getDin(3);
    $lamp2 = getDin(4);
    $lamp3 = getDin(5);
    $lamp4 = getDin(6);
    $lamp5 = getDin(7);
    $lamp6 = getDin(8);
    $floor1_temperaturSetting = getAddOptions(5);
    $back_temperaturSetting = getAddOptions(6);
    $pump1_din = getDin(9);
//    $pump2_din = getDin(10);
    $t_boiler = getTemperatur(1);
    $t_obratka = getTemperatur(2);
    $t_out = getTemperatur(3);
    $t_floor1 = getTemperatur(4);
//    $t_floor2 = getTemperatur(4);

    $smarty->assign('on_off_dout', $on_off_addOptions);
    $smarty->assign('mode', $mode);
    $smarty->assign('autoPower', $autoPower);
    $smarty->assign('on_off_din', $on_off_din);
    $smarty->assign('overheating', $overheating);
    $smarty->assign('power', $power);
    $smarty->assign('lamp1', $lamp1);
    $smarty->assign('lamp2', $lamp2);
    $smarty->assign('lamp3', $lamp3);
    $smarty->assign('lamp4', $lamp4);
    $smarty->assign('lamp5', $lamp5);
    $smarty->assign('lamp6', $lamp6);
    $smarty->assign('floor1_temperaturSetting', $floor1_temperaturSetting);
    $smarty->assign('back_temperaturSetting', $back_temperaturSetting);
    $smarty->assign('pump1_din', $pump1_din);
//    $smarty->assign('pump2_din', $pump2_din);
    $smarty->assign('t_boiler', $t_boiler);
    $smarty->assign('t_obratka', $t_obratka);
    $smarty->assign('t_floor1', $t_floor1);
    $smarty->assign('t_out', $t_out);

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'boiler');
    loadTemplate($smarty, 'footer');
}

//обнавление параметров
function updateAction(){
    include_once '../library/boilerFunction.php';
    $json = array('on_off' => getDin(1),
                  'overheating' => getDin(2),
                  'lamp1' => getDin(3),
                  'lamp2' => getDin(4),
                  'lamp3' => getDin(5),
                  'lamp4' => getDin(6),
                  'lamp5' => getDin(7),
                  'lamp6' => getDin(8),
                  'pump1' => getDin(9),
//                  'pump2' => getDin(10),
                  't_boiler' => getTemperatur(1),
                  't_obratka' => getTemperatur(2),
                  't_out' => getTemperatur(3),
                  't_floor1' => getTemperatur(4));
    $json = json_encode($json);
    echo $json;
    return TRUE;
}

//для приложения на андроид передаёт настройки
function getdataAction(){
    include_once '../library/boilerFunction.php';
    $json = array('on_off_options' => getAddOptions(1),
                  'mode' => getAddOptions(2),
                  'autoPower' => getAddOptions(3),
                  'power' => getPower_dout(),
                  'on_off' => getDin(1),
                  'overheating' => getDin(2),
                  'lamp1' => getDin(3),
                  'lamp2' => getDin(4),
                  'lamp3' => getDin(5),
                  'lamp4' => getDin(6),
                  'lamp5' => getDin(7),
                  'lamp6' => getDin(8),
                  'pump1' => getDin(9),
                  'floor1_tSetting' => getAddOptions(5),
                  'back_tSetting' => getAddOptions(6),
                  't_boiler' => getTemperatur(1),
                  't_obratka' => getTemperatur(2),
                  't_out' => getTemperatur(3),
                  't_floor1' => getTemperatur(4));
    $json = json_encode($json);
    echo $json;
    return TRUE;
}

//установка настроек
function setsettingAction(){
    include_once '../library/boilerFunction.php';

    if($_POST['on_off']==''|| $_POST['power']=='' || $_POST['temp1']==''){
        echo 'false'; return FALSE;
    }
    $on_off = clearInputDout($_POST['on_off']);
    if(!($on_off==0 || $on_off==1)){echo 'false'; return FALSE;}
    $mode = clearInputDout($_POST['mode']);
    if(!($mode==0 || $mode==1)){echo 'false'; return FALSE;}
    $autoPower = clearInputDout($_POST['autoPower']);
    if(!($autoPower==0 || $autoPower==1)){echo 'false'; return FALSE;}
    $power = clearInputPower($_POST['power']);
    if(!($power==0 || $power==2.5 || $power==5 || $power==7.5 || $power==10 || $power==12.5 || $power==15)){echo 'false'; return FALSE;}
    $temp1 = clearInputSetting($_POST['temp1']);
    if($temp1<0 || $temp1>35){echo 'false'; return FALSE;}
    $back = clearInputSetting($_POST['back']);
    if($back<40 || $back>60){echo 'false'; return FALSE;}

    setAddOptions(1, $on_off);
    setAddOptions(2, $mode);
    setAddOptions(3, $autoPower);
    setPower($power);
    setAddOptions(5, $temp1);
    setAddOptions(6, $back);
    $message = 'Применены настройки:'.
                    '<br>Котел: '.($on_off ? 'включен.' : 'отключен.').
                    '<br>Режим работы: '.($mode ? 'по обратке.' : 'по температуре комнаты.').
                    '<br>Режим управления мощностью: '.($autoPower ? 'автоматический.' : 'ручной.').
                    '<br>Мощность котла: '.$power.'кВт.'.
                    '<br>Предел температуры 1 этажа: '.$temp1.'°C.'.
                    '<br>Предел температуры обратки: '.$back.'°C.';
    addLog($message);

    echo 'true'; return TRUE;
}

//включение/отключение таймаутов
function setontimeoftAction(){
    include_once '../library/boilerFunction.php';

    if($_POST['on_off_timeout']==''){
        echo 'false'; return FALSE;
    }
    $on_off = clearInputDout($_POST['on_off_timeout']);
    if(!($on_off==0 || $on_off==1)){echo 'false'; return FALSE;}

    addLog('Таймауты: '.($on_off ? 'включены' : 'отключены'));

    if(setAddOptions(4, $on_off)){
        echo 'true'; return TRUE;
    }
}

//отображение таймаутов
function timeoutAction($smarty){
    include_once '../library/boilerFunction.php';

    $table = getTimeout();
    $on_off_timeout = getAddOptions(4);

    $smarty->assign('title', 'cottage-редактирование таймаутов котла');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/checkbox.css">
                            <link rel="stylesheet" type="text/css" href="/css/cotelTimeout.css">');
    $smarty->assign('script', '<script type="text/javascript" src="/js/cotelTimeout.js"></script>');
    $smarty->assign('str', 0);
    $smarty->assign('leftLine', '-2000px');
    $smarty->assign('table', $table);
    $smarty->assign('on_off_timeout', $on_off_timeout);

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'boilerTimeout');
    loadTemplate($smarty, 'footer');
}

//взять данные по таймаутам (для андроид)
function getTimeoutAction(){
    include_once '../library/boilerFunction.php';

    $on_off_timeout = getAddOptions(4);
    $table = getTimeout();
    array_push($table, $on_off_timeout);
    $json = json_encode($table, JSON_UNESCAPED_UNICODE);
    echo $json;
    return TRUE;
}

//добавление нового таймаута
function addtableAction(){
    include_once '../library/boilerFunction.php';
    $str1='/^[0-2][0-9]:[0-5][0-9]$/';
    $str2='/^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/';
    $str3='/^[0-2][0-9][0-5][0-9]$/';

    if($_POST['from']=='' || $_POST['before']=='' || $_POST['title']==''){echo 'false'; return FALSE;}
    $from = clearStr($_POST['from']);
    $from = testTime($from);
    if(!$from){
        echo 'false'; return FALSE;
    }
    $before = clearStr($_POST['before']);
    $before=  testTime($before);
    if(!$before){
        echo 'false'; return FALSE;
    }
    $title = clearStr($_POST['title']);

    $arr = array('from'=>$from, 'before'=>$before, 'title'=>$title);
    if(insertTimeout($arr)){
        echo 'true'; return TRUE;
    }else{
        echo 'false'; return FALSE;
    }
}

//удаление таймаута
function deleteAction(){
    include_once '../library/boilerFunction.php';
    if($_POST['id']==''){echo 'false'; return FALSE;}
    $id = intval($_POST['id']);
    if(delTimeout($id)){
        echo 'true'; return TRUE;
    }else{
        echo 'false'; return FALSE;
    }
}

//редактирование таймаута
function edittimeoutAction(){
    include_once '../library/boilerFunction.php';

    if($_POST['id']=='' || $_POST['from']=='' || $_POST['before']=='' || $_POST['title']==''){echo 'false'; return FALSE;}
    $id = intval($_POST['id']);
    $from = clearStr($_POST['from']);
    $from = testTime($from);
    if(!$from){
        echo 'false'; return FALSE;
    }
    $before = clearStr($_POST['before']);
    $before=  testTime($before);
    if(!$before){
        echo 'false'; return FALSE;
    }
    $title = clearStr($_POST['title']);

    $arr = array('id'=>$id, 'from'=>$from, 'before'=>$before, 'title'=>$title);
    if(editTimeout($arr)){
        echo 'true'; return TRUE;
    }else{
        echo 'false'; return FALSE;
    }
}

//------------------------------------------------------------------------------
//отображение лога
function logAction($smarty){
    include_once '../library/boilerFunction.php';
    include_once '../library/listFunction.php';
    $controllerName = 'boiler/log';
    //принимаем get запрос если он есть
    $page = getParameter();
    //количество строк на страницу
    $list=20;
    //количество листов
    $allList=getAllList($list);
    //масив сылок на страницы
    $listen=getArrHref($allList, $controllerName);
    //определяем начальную запись и выполняем запрос к бд
    $s=$page*$list;
    $log=getLogLimit($s, $list);

    $smarty->assign('title', 'cottage-события котла');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/log.css">');
    $smarty->assign('leftLine', '-2000px');
    $smarty->assign('log', $log);
    $smarty->assign('listen', $listen);

    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'boilerLog');
    loadTemplate($smarty, 'footer');
}