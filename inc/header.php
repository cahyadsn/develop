<?php include 'common.php';?>
<!DOCTYPE html>
<html lang='en'>
	<head>
	<title><?php echo isset($head_title)?$head_title:$apps_name;?></title>
	<meta charset="utf-8" />
    <meta http-equiv="expires" content="<?php echo date('r');?>" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta http-equiv="content-language" content="en" />
    <base href="<?php echo BASE_URL;?>">
  	<meta name="author" content="Cahya DSN" />
  	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
  	<meta name="keywords" content="<?php echo isset($head_keywords)?$head_keywords:'';?>" />
  	<meta name="description" content="<?php echo isset($head_description)?$head_description:'';?>" />
  	<meta name="robots" content="index, follow" />
  	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/w3.css">
  	<link rel="stylesheet" href="css/w3-theme-<?php echo $c;?>.css" media="all" id="apps_css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/apps.css">
    <?php echo isset($head_css)?$head_css:'';?>
    <script src="js/jquery.min.js"></script>
    <?php echo isset($head_js)?$head_js:'';?>
	</head>
	<body>
  	<header class="w3-top">
      <div class="w3-container w3-theme-d2 top">
        <h1># <?php echo $apps_name.' v'.$apps_version;?></h1>
      </div>
  	</header>
    <div id="content">
      <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left" style="display:none;" id="sidebar">
        <button class="w3-bar-item w3-button w3-large w3-theme-d5 right" id="nav_close">&times;</button>
        <?php echo isset($_SESSION['login_id'])?sidebar_menu():'';?>
        <?php if(!isset($_SESSION['login_id'])):?>
        <a href="#" class="w3-bar-item w3-button w3-theme-l2 mn_login">Login</a>
        <?php else:?>
        <a href="mod/auth/logout.php" class="w3-bar-item w3-button w3-theme-l2">Logout</a>
        <?php endif;?>
      </div>
      <div id="main">
        <nav class="w3-bar w3-theme-d5">
          <button id="nav_open" class="w3-bar-item w3-button w3-theme-d4 w3-large">&#9776;</button>
          <span class="w3-bar-item">Home</span>
          <div class="w3-dropdown-hover">
            <button class="w3-button">Themes</button>
            <div class="w3-dropdown-content w3-white w3-card-4" id="theme">
              <?php
              $color=array("black","brown","pink","orange","amber","lime","green","teal","purple","indigo","blue","cyan");
              foreach($color as $c){
                echo "<a href='#' class='w3-bar-item w3-button w3-{$c} color' data-value='{$c}'> </a>";
              }
              ?>
            </div>
          </div>
          <?php if(!isset($_SESSION['login_id'])):?>
          <button class="w3-bar-item w3-button w3-right mn_login">Login</button>
          <?php else:?>
          <button class="w3-bar-item w3-button w3-right" id="mn_logout">Logout</button>
          <?php endif;?>
        </nav>
        <?php flash('info');?>