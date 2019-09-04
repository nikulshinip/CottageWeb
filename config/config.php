<?php

//константы путей к контролерам
define("CONTROLLER_PATH_PREFIX", '../controllers/');
define("CONTROLLER_PATH_POSTFIX", 'Controller.php');

//используеммый шаблон
$template='default';

//константы путей к шаблонам
define("TEMPLATE_PATH_PREFIX", "../views/{$template}");
define("TEMPLATE_PATH_POSTFIX", '.tpl');
define("TEMPLATE_WEB_PATH", "/templates/{$template}/");

//подключаем smarty
require('../library/smarty/libs/Smarty.class.php');
$smarty=new Smarty();
    $smarty->setTemplateDir(TEMPLATE_PATH_PREFIX);
    $smarty->setCompileDir('../tmp/templates_c');
    $smarty->setCacheDir('../tmp/cache');
    $smarty->setConfigDir('../library/smarty/configs');
    
    $smarty->assign('templateWebPath', TEMPLATE_WEB_PATH);