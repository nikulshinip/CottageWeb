<?php
//2 Этаж
function indexAction($smarty){
    $smarty->assign('title', 'cottage-второй этаж');
    $smarty->assign('str', 2);
    $smarty->assign('leftLine', '188px');
    $smarty->assign('css', '<link rel="stylesheet" type="text/css" href="/css/floor.css">
                            <link rel="stylesheet" type="text/css" href="/css/floor2.css">');
//    $smarty->assign('script', '<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
//                               <script type="text/javascript" src="/js/cotel.js"></script>');
    
    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'floor');
    loadTemplate($smarty, 'footer');
}

function infoAction(){
  phpinfo();
}