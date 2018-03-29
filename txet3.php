<?php
if( !isset($_POST["prod"]) || !isset($_POST['price'])
	|| empty($_POST['price']) || !is_int($_POST['price'])
	|| empty($_POST['prod']) )
{
	echo '不對';
	exit;
}
//$db = new PDO('連線字串',帳號,密碼,額外參數);
//$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
//	,'mememe','123456' );
try {
	$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
		,'mememe','123456', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();
	exit;
}
echo "連線成功";
$stmt = $db->prepare("insert into moneybook (name,cost) values (?,?)");
$stmt->execute([$_POST["prod"], $_POST['price']]);
echo "新增了";
echo $stmt->rowCount();
echo "筆資料";