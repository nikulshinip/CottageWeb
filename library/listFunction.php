<?php
//принимаем get запрос если он есть
function getParameter(){        
    $page=isset($_GET['page']) ? abs((int)$_GET['page']) : '1';
    if($page<1)
      return FALSE;
    $page--;
    return $page;
}

//подсчет количества страниц
function getAllList($list){
    if($list==0)
        return FALSE;
    return ceil(getLogSize()/$list);
}

//создание массива ссылок на страницы
function getArrHref($allList, $controllerName){
    $listen=array();
    for($i=1;$i<=$allList;$i++){
      $listen[$i]='/'.$controllerName.'/'.$i.'/';
    }
    return $listen;
}