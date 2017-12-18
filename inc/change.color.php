<?php
if(isset($_POST)){
 session_start();
 $_SESSION['c']=$_POST['c'];
}