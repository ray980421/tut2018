<?php
if( !isset($_GET['id']) || empty($_GET['id']) )
{
	echo '����';
	echo '<a href="txet4.php">�^��C��</a>';
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
	echo $err->getMessage();  //�u��@�ɤ��o�˰�
	echo '<a href="txet4.php">�^��C��</a>';
	exit;
}
$stmt = $db->prepare('delete from moneybook where m_id=?');
$stmt->execute([$_GET['id']]);
header('Location: txet4.php',TRUE,303);  //�S�g,TRUE,333�]�i�H�A���O..
