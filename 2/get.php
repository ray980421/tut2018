<?php
//��J=======================================================
$id = $_GET['id'];
//�̦n�ˬd�@�U�Ѽ�
//��Ʈw�ާ@===================================================
try {
	$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
		,'mememe','123456', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	http_response_code(500);
	echo 'failed';
	//echo $err->getMessage(); //���ժ��ɭԥ�
	exit;
}
//�d��
$stmt = $db->prepare('select * from moneybook where m_id=?');
$stmt->execute([$id]);
//��X=======================================================
$data = NULL;
if($row = $stmt->fetch()){  //�u�n�@��
	$data = (object)[
			'prod' => $row['name'],
			'price' => $row['cost'],
			'id' => $row['m_id']
		];
}else{
	http_response_code(404);
	echo 'no data';
	exit;
}
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);              //��d�߸�Ʀ^�ǵ��Τ��