<?php 
session_start();
include '../../inc/helper/flash.php';
if(isset($_SESSION['login_user'])){
    header("location: index.php");
}
$return=array('status'=>false,'message'=>'an error occured');
if (isset($_POST['usrnm'])) {
	if (empty($_POST['usrnm']) || empty($_POST['passwd'])){
    $return=array('status'=>false,'message'=>'Username and/or Password is invalid');
	}else{
		include '../../inc/db.php';
    include '../../inc/helper/password.php';
		$sql="SELECT id_user,password,level,access FROM app_user WHERE username=? AND status=1";
		if ($stmt = $db->prepare($sql)) {
			$stmt->bind_param("s", $_POST['usrnm']);
			$stmt->execute();
			$stmt->bind_result($id_user,$passwd,$level,$access);
			if($stmt->fetch()!==NULL){
        $stmt->close();
				if(password_verify($_POST['passwd'],$passwd)){
					$sql="UPDATE app_user SET last_login = NOW() WHERE id_user = '{$id_user}'";
          $access_master = explode(", ", $access);
          $_SESSION['access'] = $access_master;
					$_SESSION['login_user']=$_POST['usrnm'];
					$_SESSION['login_id'] = $id_user;
					$_SESSION['level'] = $level;
					if($db->query($sql)){
            $return=array('status'=>true,'message'=>'Login succesfully');
          }else{
            $return=array('status'=>false,'message'=>'DB error occured');
          }
				}else{
          $return=array('status'=>false,'message'=>'Invalid Password');          
				}
				
			}else{
        $return=array('status'=>false,'message'=>'Username not found');                  
			}
		}
	}
}
flash('info',$return['message'],'w3-'.($return['status']?'green':'red'));
echo json_encode($return);