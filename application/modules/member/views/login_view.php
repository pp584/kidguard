
<style>
    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<script>
    var bFbStatus = false;
    var fbID = "";
    var fbName = "";
    var fbEmail = "";

    window.fbAsyncInit = function() {
        FB.init({
            appId: '392948474479784',
            cookie: true,
            xfbml: true,
            version: 'v2.11'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    function statusChangeCallback(response) {

        if (bFbStatus == false) {
            fbID = response.authResponse.userID;

            if (response.status == 'connected') {
                getCurrentUserInfo(response)
            } else {
                FB.login(function(response) {
                    if (response.authResponse) {
                        getCurrentUserInfo(response)
                    } else {
                        console.log('Auth cancelled.')
                    }
                }, {
                    scope: 'email'
                });
            }
        }

        bFbStatus = true;
    }

    function getCurrentUserInfo() {
        FB.api('/me?fields=name,email', function(userInfo) {

            fbName = userInfo.name;
            fbEmail = userInfo.email;

            console.log(fbID);
            console.log(fbName);
            console.log(fbEmail);
        });
    }

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
</script>
<!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
<script type="text/javascript" src="https://www.termsfeed.com/public/cookie-consent/4.1.0/cookie-consent.js" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"standalone","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false});
});
</script>

<noscript>Free cookie consent management tool by <a href="https://www.termsfeed.com/">TermsFeed</a></noscript>
<!-- End Cookie Consent by TermsFeed https://www.TermsFeed.com -->





<!-- Below is the link that users can use to open Preferences Center to change their preferences. Do not modify the ID parameter. Place it where appropriate, style it as needed. -->

<a href="#" id="open_preferences_center">Update cookies preferences</a>

<form class="form-signin" role="form" method="post" id="frm_login" onsubmit="return LogIn();return false;" autocomplete="off">
    {csrf_protection}
    <h2 class="form-signin-heading">ลงชื่อเข้าใช้งาน :</h2>

    <input type="text" autocapitalize="off" autocorrect="off" autocomplete="off" autofocus="autofocus" name="ci_login_email" id="ci_login_email" class="form-control mb-1 input-block" placeholder="อีเมล/ชื่อผู้ใช้งาน" required />

    <input type="password" autocomplete="off" name="ci_login_password" id="ci_login_password" class="form-control" placeholder="รหัสผ่าน" required />

    <div id="alert_login" style="display:none"></div>

    <button class="btn btn-lg btn-primary btn-block" id="btn_login" type="submit">
        <i class="fa fa-lock" aria-hidden="true"></i> เข้าสู่ระบบ
    </button>




    <br />
    <a href="<?php echo site_url('member/forgot_password/question'); ?>" class="btn btn-lg btn-block btn-secondary">
        <i class="fas fa-undo fa-x2"></i> ลืมรหัสผ่าน ??</i>
    </a>
    <a href="<?php echo site_url('member/forgot_password'); ?>" class="btn btn-lg btn-block btn-warning">
        <i class="fas fa-undo fa-x2"></i> ลืมรหัสผ่าน ด้วย Email ??</i>
    </a>

    <!-- 
        
    <a href="<?php echo site_url('member/regis'); ?>" class="btn btn-lg btn-block btn-success">
    <i class="fas fa-user-edit"></i> ลงทะเบียนสมาชิกใหม่!
    </a>
    <hr />
    
    <div style="padding: 100" align="center">
        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" scope="public_profile,email" onlogin="checkLoginState();" auto-logout-link="true"></div>
    </div> 

-->


</form>