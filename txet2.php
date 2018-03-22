<?php
$a = "預設值";
if(!isset($_GET['xxx'])){
	echo "設定預設值xxx";
}else{
	$a = $_GET['xxx'];
}
echo "tut2!";