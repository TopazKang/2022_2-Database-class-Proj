<?php
session_start();
ini_set("display_errors", 1);
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

$query_tagchk = "select count(*) from member_tag where id = '$userid'";
$result_tagchk = oci_parse($connect, $query_tagchk);
$success_tagchk = oci_execute($result_tagchk);

$row_tagchk = oci_fetch_array($result_tagchk, OCI_ASSOC + OCI_RETURN_NULLS);
foreach ($row_tagchk as $item) {
}

if ($item == 0) {
    echo "<script>alert('태그가 선택되지 않았습니다.');</script>";
    echo "<script>location.replace('./../../standard/tag_select_form.php');</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="./../../css/main.css" type="text/css" media="all">
</head>

<body>
    <header>
        <li id="logo"><a id=logoname href="">Light House</a></li>
        <div id="menu1">
            <ul class="head">
                <li><a href="./tip_list.php">태그 게시판</a></li>
                <li><a href="./../notify_board/notify_board_auth.php">공지사항</a></li>
                <li><a href="./../mypage_form.php">마이페이지</a></li>
                <li><a href="./../../standard/logout.php">로그아웃</a></li>
            </ul>
        </div>
        <img src="./../../bum1.jpg" width="100%" height="300">

    </header>
    <footer>
        <div id="board_area">
            <h1>게시판</h1>
            <h4>모든 게시글을 확인할 수 있습니다.</h4>
            <div class="bt_wrap">
                <a href="./../index.php" class="on">메인</a>
            </div>
            <table class="list-table">
                <thead>
                    <tr>
                        <th width="900">제목</th>
                        <th width="250">글쓴이</th>
                        <th width="125">작성일</th>
                        <th width="125">태그</th>
                    </tr>
                </thead>
                <?php

                $query_count = "select count(*) from member_tag where id = '$userid'";
                $result_count = oci_parse($connect, $query_count);
                $success_count = oci_execute(($result_count));

                $row_count = oci_fetch_array($result_count, OCI_ASSOC + OCI_RETURN_NULLS);
                foreach ($row_count as $item) {
                }
                $query_tag = "select tag from member_tag where id = '$userid'";
                $result_tag = oci_parse($connect, $query_tag);
                $success_tag = oci_execute($result_tag);

                $cn = 0;
                while ($row_tag = oci_fetch_array($result_tag, OCI_NUM + OCI_RETURN_NULLS)) {
                    $item_tag[$cn] = $row_tag[0];
                    $cn = $cn + 1;
                }

                $tagstr = implode("','", $item_tag);

                $query = "select * from tpbd where tag in ('$tagstr') order by ptime DESC";
                $result = oci_parse($connect, $query);
                $success = oci_execute($result);

                while ($row = oci_fetch_array($result, OCI_NUM)) {
                    $title = $row[2];
                    $id = $row[1];
                    $time = $row[4];
                    $tag = $row[5];
                    $pk = $row[0];

                ?>
                <tbody>
                    <tr>
                        <td width="900"><a href="./tip_read_authority.php?pk=<?php echo $pk; ?> ">
                                <?php echo $title; ?>
                            </a></td>
                        <td width="250">
                            <?php echo $id ?>
                        </td>
                        <td width="125">
                            <?php echo $time ?>
                        </td>
                        <td width="125">
                            <?php echo $tag ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <div id="write_btn">
                <a href="./tip_write_form.php"><button>글쓰기</button></a>
            </div>
        </div>
    </footer>

</html>