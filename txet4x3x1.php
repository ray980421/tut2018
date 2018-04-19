<?php
if( !isset($_POST['id'])
    || !isset($_POST['prod']) || !isset($_POST['price'])
	|| empty($_POST['price']) 
	|| empty($_POST['prod']) )
{
	echo '不對';
	echo '<a href="txet4.php">回到列表</a>';
	exit;
}

try {
	$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
		,'mememe','123456', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();  //真實世界不這樣做
	echo '<a href="txet4.php">回到列表</a>';
	exit;
}

$stmt = $db->prepare('update moneybook set name=?,cost=? where m_id=?');
$stmt->execute([$_POST['prod'],$_POST['price'],$_POST['id']]);

header('Location: txet4.php',TRUE,303);  //沒寫,TRUE,333也可以，但是..
