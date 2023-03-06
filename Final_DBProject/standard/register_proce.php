<?php
include_once "./../header/pw_verify.php";
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

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$nm = $_POST['nm'];
$bth = $_POST['bth'];
$mail = $_POST['mail'];
$ph = $_POST['ph'];
$ct = $_POST['ct'];
if ($pw == $pw2) {
    $encrypt_pw = password_hash($pw, PASSWORD_DEFAULT);

    $query_idchk = "select count(*) from member_dbag2 where id = '$id'";
    $result_idchk = oci_parse($connect, $query_idchk);
    $success_idchk = oci_execute($result_idchk);

    $row = oci_fetch_array($result_idchk, OCI_ASSOC + OCI_RETURN_NULLS);
    foreach ($row as $item) {
    }


    if ($item > 0) {
        echo "<script>alert('이미 존재하는 아이디 입니다.');</script>";
        echo "<script>location.replace('register_form.php');</script>";
    } else {
        $query = "insert into member_dbag2 values('$id','$encrypt_pw','$nm',TO_DATE('$bth','YYYY-MM-DD'),'$mail','$ph','$ct')";
        $result = oci_parse($connect, $query);
        $success = oci_execute($result);
        oci_free_statement($result);
    }
}
else{
    echo "<script>alert('재입력된 비밀번호가 일치하지 않습니다.');</script>";
    echo "<script>location.replace('register_form.php');</script>";
}


oci_free_statement($result_idchk);
oci_close($connect);

if ($success) {
    echo "<script>alert('회원가입 완료')</script>";
    echo "<script>location.replace('./../main/index.php');</script>";
} else {
    echo "<script>alert('회원가입 실패')</script>";
    echo "<script>location.replace('register_form.php');</script>";
}
?>