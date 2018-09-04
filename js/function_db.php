<?php
function connect(){#ติดต่อฐานข้อมูล
  $servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'movie_tickets';
  try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);#mysql
  #$conn = new PDO("sqlsrv:Server=$servername;Database=$dbname", $username, $password);#sqlsrv
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  #$conn->setAttribute( PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8 );#sqlsrv

    	return $conn;
  }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
  }
}
function selectSql($sql){#แสดงข้อมุล
	$conn = connect();
	$sth = $conn->prepare($sql);
	$sth->execute();
	$rows = array();
	$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
    foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $k=>$v) {
        $rows[] = $v;
    }
	$conn = null;
  return $rows;
}
function in_up_delSql($sql){#แทรก แก้ไข ลบ ข้อมูล
	$conn = connect();
	$sth = $conn->prepare($sql);
	$sth->execute();
  $conn = null;
  return false;
}
function delAllSql($sql, $Table, $col){# ลบข้อมูลทีละหลายระเบียง (แถว)
	$conn = connect();
  	foreach($sql as $value){
  	$sth = $conn->prepare('DELETE FROM '.$Table.' WHERE '.$col.' = "'.$value.'"');
  	$sth->execute();
  	}
	$conn = null;
	return false;
}
?>
