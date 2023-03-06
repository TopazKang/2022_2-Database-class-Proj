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
            <li><a href="./board/tip_board_list.php">게시판</a></li>
            <li><a href="./notify_board/notify_board_auth.php">공지사항</a></li>
            <li><a href="./../standard/logout.php">로그아웃</a></li>
            <li><a href="./mypage_form.php">마이페이지</a></li>
          </ul>
        </div>
        <img src="./../bum1.jpg" width="100%" height="300">
        
    </header>
    <footer>
        <div id="board_area">
            <h1>팁 게시판</h1>
            <h4>학교 생활의 팁을 공유해보세요.</h4>
            <div class="bt_wrap">
                <a href="./index.php" class="on">메인</a>
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
                $query = "select * from tpbd order by ptime DESC";
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
                        <td width="900"><a href="tip_read_authority.php?pk=<?php echo $pk; ?> ">
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
                <a href="tip_write_form.php"><button>글쓰기</button></a>
            </div>
          </div>
          </footer>
</html>
