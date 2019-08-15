<?php 



date_default_timezone_set('America/Chicago');



$home_path = '/var/www/html/';



// put full path to Smarty.class.php

require($home_path . '../smarty/Smarty.class.php');

$smarty = new Smarty();



$smarty->setTemplateDir($home_path . 'smarty/templates');

$smarty->setCompileDir($home_path . 'smarty/templates_c');

$smarty->setCacheDir($home_path . 'smarty/cache');

$smarty->setConfigDir($home_path . 'smarty/configs');







$smarty->assign('bodyID', 'index');

//$smarty->assign('arrTimes', $timeSlots);

$smarty->display('index.tpl');



