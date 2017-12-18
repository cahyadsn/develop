<?php
function sidebar_menu(){
  global $db;
	$sql="SELECT a.id_menu,a.name AS menu_name,b.url,b.icon,b.name AS modul_name,b.id_module
        FROM app_menu a
        JOIN app_module b USING(id_menu)
        JOIN app_user c ON (b.id_module REGEXP CONCAT('^(',REPLACE(c.access,',','|'),')$') OR c.level='100')
        WHERE c.id_user={$_SESSION['login_id']}
        ORDER BY a.sort,b.sort ASC";
	$result = $db->query($sql);
	$menu=$hasil='';
	while ($r = $result->fetch_object()) {
		if($menu!=$r->id_menu){
			if(!empty($menu)) $hasil.="</div>";
			$hasil.="<button data-value='{$r->id_menu}' class='w3-button w3-block w3-left-align w3-theme-d4 nav_acc'>"
             ."{$r->menu_name} <i class='fa fa-caret-down w3-right'></i></button>"
				     ."<div id='acc_{$r->id_menu}' class='w3-white w3-card-2 w3-theme-l1'>";
			$menu=$r->id_menu;
		}
		$hasil.="<a href='{$r->url}' class='w3-bar-item w3-button'><i class='{$r->icon}'></i> {$r->modul_name}</a>";
	}
  $hasil.="</div>";
  return $hasil;
} 
