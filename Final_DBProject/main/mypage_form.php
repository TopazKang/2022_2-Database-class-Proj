<?php
session_start();
if (!isset($_SESSION['userid'])) {
    echo "<script>location.replace('./../standard/login_form.php');</script>";
} else {
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
}
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

session_start();
if (!isset($_SESSION['userid'])) {
    echo "<script>location.replace('./../standard/login_form.php');</script>";
} else {
    $userid = $_SESSION['userid'];
}

$sql = "SELECT * FROM member_dbag2 WHERE id='$userid'";
$stat = oci_parse($connect, $sql);
$ret = oci_execute($stat);
if (!$ret) {
    echo "SQL문 오류!" . "<br>";
    echo "<br><a href='index.php'> <--초기 화면</a>";
    exit();
} else {
    while ($row = oci_fetch_array($stat)) {
        $name = $row["NAME"];
        $birthYear = $row["BIRTH"];
        $email = $row["MAIL"];
        $phone = $row["PHONE"];
        $city = $row["CITY"];
    }

    oci_free_statement($stat);
    oci_close($connect);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="./../css/main.css" type="text/css" media="all">
</head>

<body>
    <header>
        <li id="logo"><a id=logoname href="">Light House</a></li>
        <div id="menu1">
            <ul class="head">
                <li><a href="./board/tip_list.php">태그 게시판</a></li>
                <li><a href="./notify_board/notify_board_auth.php">공지사항</a></li>
                <li><a href="./mypage_form.php">마이페이지</a></li>
                <li><a href="./../standard/logout.php">로그아웃</a></li>
            </ul>
        </div>
        <img src="./../bum1.jpg" width="100%" height="300">

    </header>
    <footer>

        <h1 align="center">회원 정보 수정 <h1>
                <FORM name="mypage_form" ACTION="mypage_proc.php" METHOD="POST">
                    <table width="50%" border="1" cellspacing="0" align="center" class="tbodymargin">
                        <tr align="center">
                            <td>아이디</td>
                            <td>
                                <?php echo $userid ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>비밀번호</td>
                            <td><INPUT TYPE="password" NAME="password"></td>
                        </tr>
                        <tr align="center">
                            <td>비밀번호 확인</td>
                            <td><INPUT TYPE="password" NAME="password_chk"></td>
                        </tr>
                        <tr align="center">
                            <td>이름</td>
                            <td>
                                <?php echo $name ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>출생년도</td>
                            <td>
                                <?php echo $birthYear ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>이메일</td>
                            <td>
                                <?php echo $email ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>전화번호</td>
                            <td>
                                <?php echo $phone ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>도시</td>
                            <td><INPUT TYPE="text" NAME="city" VALUE=<?php echo $city ?>></td>
                        </tr>
                        <tr align="center">
                            <td colspan=2>
                                <input type="submit" class="btn" value="정보 수정">
                                <button type="button" class="delete" onclick="location.href='mypage_proc_delete.php'">
                                    탈퇴
                                </button>
                                <button type="button" class="delete" onclick="location.href='./../standard/tag_select_form.php'">
                                    태그 선택
                                </button>
                            </td>
                        </tr>
                    </table>
                </FORM>


    </footer>

</html>