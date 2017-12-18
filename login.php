<?php 
session_start();
if(isset($_SESSION['login_user'])){
    header("location: index.php");
}
$error='';
if (isset($_POST['usrnm'])) {
	if (empty($_POST['usrnm']) || empty($_POST['passwd'])){
		$error = "Username or Password is invalid";
	}else{
		include 'inc/db.php';
    include 'inc/helper/password.php';
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
            header('location:index.php');
          }else{
            $error="DB error occured";
          }
				}else{
					$error="Invalid Password";
				}
				
			}else{
				$error="Username not found";
			}
		}
	}
}