<?php
$pk = $_GET['pk'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <link rel="stylesheet" href="./../../css/edit.css">
</head>

<body>
    <form name="tip_delete_form" method="POST" action="notify_delete_proce.php?pk=<?php echo $pk; ?>">
        <div class="board_wrap">
            <div class="board_title">
                <strong>공지사항 게시판</strong>
                <p>공지사항 게시판입니다.</p>
            </div>
            <div class="board_write_wrap">
                <div class="board_write">
                <div class="title">
                        <dl>
                            <dd>
                                삭제하시려면 비밀번호를 입력 후 삭제 버튼을 클릭하세요.
                            </dd>
                        </dl>
                    </div>
                    <div class="info">
                        <dl>
                            <dt>비밀번호</dt>
                            <dd><input type="password" name="pw" placeholder="비밀번호 입력"></dd>
                        </dl>
                    </div>
                    <div class="bt_wrap">
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="삭제">
                        <a href="notify_list_manage.php">취소</a>
                    </div>
                </div>
            </div>
</body>

</html>