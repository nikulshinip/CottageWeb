<?php

function indexAction($smarty){
    $smarty->assign('title', 'cottage-гараж');
    $smarty->assign('str', 4);
    $smarty->assign('leftLine', '588px');
    
    loadTemplate($smarty, 'head');
    loadTemplate($smarty, 'footer');
}