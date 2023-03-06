<?php
session_start();
if (!isset($_SESSION['userid'])) {
    echo "<script>location.replace('./../standard/login_form.php');</script>";
} else {
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
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
                <li><a href="./../main/board/tip_list.php">태그 게시판</a></li>
                <li><a href="./../main/notify_board/notify_board_auth.php">공지사항</a></li>
                <li><a href="./../main/mypage_form.php">마이페이지</a></li>
                <li><a href="./logout.php">로그아웃</a></li>
            </ul>
        </div>
        <img src="./../bum1.jpg" width="100%" height="300">

    </header>
    <footer>
        <div id="container" class="main_container">
            <div style="padding: 20px;"></div>
            <div class="register_container">
                <div class="form_container">
                    <form method="post" action="tag_select_proce.php">
                        태그를 선택하세요<br>
                        <input type="checkbox" name="interest[]" value="#computer">컴퓨터<br>
                        <input type="checkbox" name="interest[]" value="#car">차<br>
                        <input type="checkbox" name="interest[]" value="#food">맛집<br>
                        <input type="checkbox" name="interest[]" value="#camera">카메라<br>
                        <input type="checkbox" name="interest[]" value="#tour">관광<br>
                        <input type="checkbox" name="interest[]" value="#sport">운동<br>
                        <input type="checkbox" name="interest[]" value="#contest">대외활동<br>
                        <input type="checkbox" name="interest[]" value="#job">취업<br>
                        <input type="checkbox" name="interest[]" value="#used">중고거래<br>
                        <input type="submit" value="완료">
                    </form>
                </div>
            </div>
        </div>
    </footer>

</html>