<?php
session_start();
$c=isset($_SESSION['c'])?$_SESSION['c']:(isset($_GET['c'])?$_GET['c']:'indigo');
define("_AUTHOR","cahyadsn");
$_SESSION['author']='cahyadsn';
$_SESSION['ver']=sha1(rand());
set_include_path('../../inc');
if(!defined('BASE_URL')) define('BASE_URL','http://localhost/develop/');
//if(!isset($_SESSION['login_user'])) header('location:'.BASE_URL.'login.php');
date_default_timezone_set('Asia/Jakarta');
include 'db.php';
include 'helper/log.php';
include 'helper/flash.php';
include 'helper/sidebar.php';
//=============================
$apps_name        = 'App';
$apps_version     = '0.1';
$head_title       = isset($head_title)?$head_title:'App v0.1';
$head_keywords    = isset($head_keywords)?$head_keywords:'';
$head_description = isset($head_description)?$head_description:'';
//=============================
