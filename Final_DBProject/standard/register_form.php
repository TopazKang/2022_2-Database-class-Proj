<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <link rel="stylesheet" href="./../css/registercss.css" type="text/css" media="all" />
</head>
<body>
    <div id="container" class="main_container">
        <div style="padding: 20px;"></div>
        <div class="register_container">
            <div class="form_container">
                <form name="login_form" action="register_proce.php" method="POST">
                    <div class="form_title_div">
                        <p class="form_title_p">회원가입</p>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">이름</a>
                        </div>
                        <div>
                            <input type="text" name="nm" placeholder="gildong" class="form_input" size="30"/>
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_username" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">이메일</a>
                        </div>
                        <div>
                            <input type="text" name="mail" placeholder="abcd@abcd.com" class="form_input" size="30"/>

                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_email" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">아이디</a>
                        </div>
                        <div>
                            <input type="text" name="id" placeholder="abcd" class="form_input" size="30"/>

                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_email" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">비밀번호</a>
                        </div>
                        <div>
                            <input type="password" name="pw" placeholder="qwer" class="form_input" size="30" />
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_password" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">비밀번호확인</a>
                        </div>
                        <div>
                            <input type="password" name="pw2" placeholder="qwer" class="form_input" size="30" />
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_password2" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">생년월일</a>
                        </div>
                        <div>
                            <input type="date" name="bth" onfocus="" class="form_input" size="30"/>
                        </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_date2" class="form_text_alert"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">전화번호</a>
                        </div>
                        <div>
                            <input type="tel" name="ph" onfocus="" placeholder="01000000000" class="form_input" size="30"/>
                        </div>
                    </div>
                    <div class="form_text_alert_padding">
                        <div id="alert_tel2" class="form_text_alert"></div>
                    </div>
                    <div>
                        <div>
                            <a class="form_item_name">도시</a>
                        </div>
                        <div>
                            <input type="text" name="ct" onfocus="" placeholder="suwon" class="form_input" size="30"/>
                        </div>
                    </div>
                        <div class="form_text_alert_padding">
                            <div id="alert_tel2" class="form_text_alert"></div>
                        </div>
                    <div style="height: 10px;">
                    </div>
                    <div>
                    <p align="center"><input type="submit" class="form_submit_button" name="확인" value="확인"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>