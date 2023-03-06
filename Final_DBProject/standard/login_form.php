<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="./../css/logincss.css" type="text/css" media="all" />
</head>

<body>
    <div id="container" class="main_container">
        <div style="padding: 20px;"></div>
        <div class="login_container">
            <div class="form_container">
                <form name="login_form" action="login_proce.php" method="POST">
                    <div class="form_title_div">
                        <p class="form_title_p">로그인</p>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">아이디</a>
                        </div>
                        <div>
                            <input type="text" name="id" placeholder="abcd" class="form_input" size="10" />
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_username" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">비밀번호</a>
                        </div>
                        <div>
                            <input type="password" name="pw" placeholder="qwer" class="form_input" size="20" />
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_password" class="form_text_alert"></div>
                        </div>
                        <div style="height: 8px;">
                        </div>
                        <div>
                            <input type="submit" class="form_submit_button" name="확인" value="확인" />
                        </div>
                        <div style="height: 5px;">
                        </div>
                        <div>
                            <button type="button" class="form_register_button"
                                onclick="location.href='register_form.php'">
                                회원가입
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>