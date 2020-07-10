<?php 

$db_user='root';
$db_password='';
$db_name='v_cromotexapi';
$db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name.';charset=utf8',$db_user,$db_password);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(pdo::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
define('app_name','php rest Cromotex');

?>