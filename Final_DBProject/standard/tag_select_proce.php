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

$interest = $_POST['interest'];

$query_del = "delete from member_tag where ID = '$userid'";
$result_del = oci_parse($connect, $query_del);
$success_del = oci_execute($result_del);


foreach ($interest as $item) {
    $query = "insert into member_tag values('$userid', '$item')";
    $result = oci_parse($connect, $query);
    $success = oci_execute($result);
}
oci_free_statement($result_del);
oci_free_statement($result);
oci_close($connect);

if ($success) {
    echo "<script>alert('태그 선택이 완료되었습니다');</script>";
    echo "<script>location.replace('./../main/index.php');</script>";
} else {
    echo "<script>alert('태그 선택을 실패하였습니다');</script>";
    echo "<script>location.replace('tag_select_form.php');</script>";
}
?>