<?php
include "../../inc/common.php";
if(session_destroy()){
	header("location:".BASE_URL."index.php");
}