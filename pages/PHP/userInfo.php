<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newbie's Kitchen</title>
    <link href="../../img/icon.ico" rel="icon" type="/image/x-ico"/>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/bootstrap-validator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/language/zh_CN.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="../../scripts/jquery.cookie.js"></script>
    <link rel="stylesheet" href="../../css/userInfoCSS.css">

    <script src="../../scripts/audioPlayer.js"></script>
    <!--    <script src="../scripts/cookieProcess.js"></script>-->
    <?php 
    echo "<script>console.log(\"is:".$_COOKIE["account"]."\");</script>";
    if(isset($_COOKIE["account"]) && !($_COOKIE["account"] === "null")){
        echo "<script>console.log(\"is:".$_COOKIE["account"]."\");</script>";
        $account = $_COOKIE["account"];
        $conn = mysqli_connect('localhost:3306', 'root', '59951308');
        mysqli_query($conn, "set names utf8");
        $sql = "SELECT *
                FROM userdata.userinfo
                WHERE account ='$account';";
        mysqli_select_db($conn,'userdata');
        $retval = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        mysqli_close($conn);
    }else{
        echo "<script>console.log(\"is:".$_COOKIE["account"]."\");</script>";
        header("Location: ../login.html");
        exit();
    }
    ?>
    <script>
        var userData=
            <?php
            echo json_encode($row);
            ?>
        ;
    </script>


</head>


<header style="background-image:url(../../img/userInfo/小镇.png) ; height: 200px;">
    <!-- <img src="../img/userInfo/小镇.png" width="100%" style="position: absolute;z-index: -1;margin: 0 auto;justify-content: center; filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.445));;" /> -->


    <nav class=" navbar navbar-expand-lg navbar-light blurContainer">
        <a class="navbar-brand" href="../../index.html#">
            <img src="../../img/logo.png" height="30" class="d-inline-block align-top" alt=""
                 style="filter: brightness(0)">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.html#">主页</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">个人面板<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../devLog.php">开发日志<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">留言板<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../art.html">艺术设定<span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

</header>

<body>

<div class="container-fluid" style="margin-top: 0.5vw">
    <div class="row" style="margin-right: 0;padding-top: 5%; ">
        <div class=" col-lg-5 offset-2">
            <div class="row info-card"
                 style="box-shadow: 2px 2px 10px 3px rgba(0,0,0,0); border:1px solid rgba(83,82,80,0.42); width: 60%">
                <div class="col-2" style="text-align: left;">
                    <h6>邮箱:</h6>
                </div>
                <div class="col-4" style="text-align: left;">
                    <h6><span id="email"></span></h6>
                </div>
            </div>
            <div class="row info-card"
                 style="box-shadow: 2px 2px 10px 3px rgba(0,0,0,0); border:1px solid rgba(83,82,80,0.42);width: 60%">

                <div class="col-2" style="text-align: left;">
                    <h6>偏好:</h6>
                </div>
                <div class="col-4" style="text-align: left;">
                    <h6><span id="favor"></span></h6>
                </div>
            </div>
            <div class="row info-card"
                 style="box-shadow: 2px 2px 10px 3px rgba(0,0,0,0); border:1px solid rgba(83,82,80,0.42);width: 60%">

                <div class="col-2" style="text-align: left;">
                    <h6>班级:</h6>
                </div>
                <div class="col-4" style="text-align: left;">
                    <h6><span id="class"></span></h6>
                </div>
            </div>
            <div class="row  info-card"
                 style="box-shadow: 2px 2px 10px 3px rgba(0,0,0,0); border:1px solid rgba(83,82,80,0.42);width: 60%">
                <div class="col">
                    <h6>你<span id="enable"></span>允许我们发送邮件。</h6>
                </div>
            </div>
            <div class="row" style="margin-top:50% ">
                <div class="col-6">
                    <button id="exit" class="btn custom-confirm-btn" >退出登录</button>
                </div>
            </div>
        </div>
        <div class=" col-lg-4" style="text-align: center;">
            <div class="info-card"
                 style=" margin-top: -8%;padding-top: 6%;padding-bottom: 10%;margin-bottom: 5%;height: 100%">
                <div class="row">
                    <div class="col">
                        <img id="userAvatar" src="" style="width: 70%;border-radius: 50px;">
                    </div>
                </div>
                <div class="row" style="margin-top: 6%">
                    <div class="col">
                        <span id="account" class="account">账号在这里显示</span>
                        <span class="badge" id="edition" style="color: #ffffff">edition</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span id="userName" class="userName">用户名在这里显示</span>
                        <i id="gender" class="fa fa-2x" style="padding-left: 1%;"></i>
                    </div>
                </div>
                <script>
                    document.getElementById("userName").innerHTML = userData.username;
                    document.getElementById("account").innerHTML = "@" + userData.account;
                    var edition = document.getElementById("edition");
                    edition.innerHTML = userData.edition.toUpperCase();
                    switch (userData.edition) {
                        case "gold":
                            edition.classList.add("badge-warning");
                            break;
                        case "standard":
                            edition.classList.add("badge-primary");
                            break;
                        case "deluxe":
                            edition.classList.add("badge-success");
                            break;
                        default:
                    }
                    var gender = document.getElementById("gender");
                    if (userData.gender === "male") {
                        gender.classList.add("fa-mars");
                        gender.style.color = "#509ef9";
                    } else {
                        gender.classList.add("fa-venus");
                        gender.style.color = "#f97edb";
                    }
                    document.getElementById("email").innerHTML = userData.email;
                    document.getElementById("favor").innerHTML = userData.favor;
                    document.getElementById("class").innerHTML = userData.classname;
                    // alert(userData.enableemail);
                    if (userData.enableemail != "enable") {
                        document.getElementById("enable").innerHTML = "不";
                    }
                    document.getElementById("userAvatar").src = "../../users/" + userData.account + ".jpg";
                </script>
            </div>
        </div>
    </div>


</div>
</body>
<script>
    $("#exit").click(function(){
        $.removeCookie('account');
        console.log("delete!");
        window.location.reload();
    })


</script>
</html>