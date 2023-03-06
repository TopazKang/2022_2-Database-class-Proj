<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include_once "./../header/pw_verify.php";

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

$password = $_POST["password"];
$password_chk = $_POST["password_chk"];
$city = $_POST["city"];
echo $password;
echo $city;

$encrypt_pw = password_hash($password, PASSWORD_DEFAULT);

if ($password == null) {
    echo "<script>alert('비밀번호란이 비어있습니다.')</script>";
    echo "<script>location.replace('mypage_form.php');</script>";
    exit;
}
elseif ($password_chk == null) {
    echo "<script>alert('비밀번호확인란이 비어있습니다.')</script>";
    echo "<script>location.replace('mypage_form.php');</script>";
    exit;
}else{
    if ($password != $password_chk) {
        echo "<script>alert('비밀번호 확인 틀림')</script>";
        echo "<script>location.replace('mypage_form.php');</script>";
    }
    else{
        $query_pw = "select pw, city from member_dbag2 where id = '$userid'";
        $result_pw = oci_parse($connect, $query_pw);
        $success_pw = oci_execute($result_pw);

        while($row_pw = oci_fetch_array($result_pw, OCI_NUM)){
            $ex_pw = $row_pw[0];

            if((password_verify($password, $ex_pw))==true){
                echo "<script>alert('중복된 비밀번호 입니다');</script>";
                echo "<script>location.replace('mypage_form.php');</script>";
            }
            else{
                $query = "update member_dbag2 set pw = '$encrypt_pw', city = '$city' where id = '$userid'";
                $result = oci_parse($connect, $query);
                $success = oci_execute($result);
            }
        }
    }
}
oci_free_statement($result);
oci_free_statement($result_pw);
oci_close($connect);

if($success){
    echo "<script>alert('변경이 완료되었습니다.');</script>";
    echo "<script>location.replace('./../main/index.php');</script>";
}else{
    echo "<script>alert('변경을 실패하였습니다.');</script>";
    echo "<script>location.replace('mypage_proc.php');</script>";
}

?>