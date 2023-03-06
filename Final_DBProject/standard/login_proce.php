<html>

<body>

    <?php
    include_once "./../header/pw_verify.php";
    ini_set('display_errors', '1');
    session_start();

    $db = '
(DESCRIPTION=
    (ADDRESS_LIST=
        (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
        )
    (CONNECT_DATA=
    (SID=orcl)
    )
)';
    $username = 'DBA2022G2';
    $password = 'test1234';
    $connect = oci_connect($username, $password, $db);

    if (!$connect) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);

    }

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    if (!is_null($id)) {
        $query = "select * from member_dbag2 where id = '$id'";
        $result = oci_parse($connect, $query);
        $success = oci_execute($result);



        while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $mmpw = $row['PW'];
            if ((password_verify($pw, $mmpw)) == true) {
                $_SESSION['userid'] = $id;
                $_SESSION['name'] = $row['NAME'];
                echo "<script>alert('로그인 성공.');</script>";
                echo"<script>location.replace('./../main/index.php');</script>";
                exit;
            } else {
                echo "<script>alert('아이디 혹은 비밀번호가 틀렸습니다.');</script>";
                echo"<script>location.replace('login_form.php');</script>";
                exit;
            }
        }
    }
    echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
    echo"<script>location.replace('login_form.php');</script>";




    oci_free_statement($result);
    oci_close($connect);
    ?>
</body>

</html>