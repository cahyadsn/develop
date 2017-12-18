<?php
function wlog($db,$msg,$type=0){
  $sql="INSERT INTO app_log 
        SET 
          description='{$msg}',
          type='{$type}',
          id_user='{$_SESSION['login_id']}'";
   $r=array('status'=>false,'msg'=>'log user activity failure');
   if($db_>query($sql)){
    $r=array('status'=>true,'msg'=>'log user activity success');
   }
   return $r;
}