<?php
session_start();
$userid = $_SESSION['userid'];
$db = '
(DESCRIPTION=
    (ADDRESS_LIST=
        (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
        )
    (CONNECT_DATA=
    (SID=orcl)
    )
)';
$username = "DBA2022G2";
$password = "test1234";
$connect = oci_connect($username, $password, $db);

if (!$connect) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}



$SQL = "DELETE FROM member_dbag2 where id='$userid'";
$result = oci_parse($connect, $SQL);
$success = oci_execute($result);

$query_tag = "DELETE FROM member_tag where id='$userid'";
$result_tag = oci_parse($connect, $query_tag);
$success_tag = oci_execute($result_tag);

oci_free_statement($result_tag);
oci_free_statement($result);
oci_close($connect);

if ($success) {
    echo "<script>alert('회원탈퇴 완료')</script>";
    echo "<script>location.replace('./../standard/login_form.php');</script>";
    exit;
} else {
    echo "<script>alert('회원탈퇴 실패')</script>";
    echo "<script>location.replace('mypage_form.php');</script>";
    exit;
}

?>