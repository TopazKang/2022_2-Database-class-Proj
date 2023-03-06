<?php
session_start();
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('로그인 상태가 아닙니다');</script>";
    echo "<script>location.replace('/../../standard/login_form.php');</script>";
}
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

$query_id = "select count(*) from admin where id = '$userid'";
$result_id = oci_parse($connect, $query_id);
$success_id = oci_execute($result_id);

$row = oci_fetch_array($result_id, OCI_ASSOC + OCI_RETURN_NULLS);
foreach ($row as $item) {
}

if ($item > 0) {
    echo "<script>location.replace('./notify_list_manage.php');</script>";
} else{
    echo "<script>location.replace('./notify_list_user.php');</script>";
}

oci_free_statement($result_id);
oci_close($connect);

?>