<!DOCTYPE html>
<meta charset="utf-8"/>

<html lang="zh">
<?php
$account =$_POST["account"];
$username =$_POST["userName"];
$email =$_POST["email"];
$gender =$_POST["gender"];
$classname =$_POST["className"];
$favor_arr=array();
$favor_arr=$_POST["favor"];
$favor = implode(',', $favor_arr);
$edition =$_POST["edition"];
$pwd =$_POST["pwd"];


$enableemail_arr=array();
$enableemail_arr=$_POST["enableEmail"];
$enableemail =$enableemail_arr[0];
if(array_key_exists(1,$enableemail_arr)){
    $enableemail =$enableemail_arr[1];
}
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
    && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
//        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    } else {
//        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        if (file_exists("upload/" . $_FILES["file"]["name"])) {
//            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "../../users/" . $account.".jpg");
        }
    }
} else {
//    echo "非法的文件格式";
}
$conn = mysqli_connect('localhost:3306', 'root', '59951308');
mysqli_query($conn , "set names utf8");

$sql = "INSERT INTO userdata.userinfo ".
    "(account,username,email,gender,classname,favor,pwd,edition,enableemail) ".
    "VALUES ".
    "('$account','$username','$email','$gender','$classname','$favor','$pwd','$edition','$enableemail')";

mysqli_select_db( $conn, 'userdata' );
$retval = mysqli_query( $conn, $sql );
mysqli_close($conn);
?>
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newbie's Kitchen</title>
    <link href="../../../img/icon.ico" rel="icon" type="/image/x-ico"/>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/bootstrap-validator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/language/zh_CN.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="../../scripts/jquery.cookie.js"></script>
    <link rel="stylesheet" href="../../../css/registerCSS.css">

    <script src="../../../scripts/audioPlayer.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>

    <script src="../scripts/registerManager.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</head>

<header>
    <img src="../../../img/Register/kit1.png" width="100%"
         style="position: absolute;z-index: -1;margin: 0 auto;justify-content: center;"/>

    <a href="../../index.html">
        <img src="../../img/logo.png" style="position:absolute; margin-left: 0.8%; margin-top: 1%;" width="100px"/>
    </a>

    <div align="right" class="mainBar" style="float: right;right: 0;width: 1300px;margin-top: 1vw;margin-right: 1vw;">
    <a class=" toolbar"     href="userInfo.php" style="text-decoration: none;">个人面板</a>
        <a class=" toolbar" href="" style="text-decoration: none;">线上预览</a>
        <a class=" toolbar" href="" style="text-decoration: none;">预购/捐赠</a>
        <a class=" toolbar" href="../devLog.php" style="text-decoration: none;">开发日志</a>
        <div class="player" style="float:right;margin-right: 3%;margin-top: -0.1%;">
            <div class="play" id="player" onclick="Player()">
                <audio id="BGM" loop="" preload="">
                    <source src="../../../music/做菜2无损完整 (1).mp3"/>
                </audio>
            </div>
        </div>
    </div>

</header>

<body>

<div class="container-fluid" style="top: 15vw;position: absolute;background-color: cornflowerblue;">
    <div class="row" style="background-color: blue; margin-right: 0;">
        <div class=" col-2 offset-4">
            <img src="../../../img/Register/组 1.png" width="200%"
                 style="position: absolute;left: 0%;z-index: 5; margin-top: 10%;"/>
        </div>


    </div>


    <div class="container-fluid "
         style="position: absolute; top:12vw; padding-left: 30%; padding-right: 30%; left: 0;background-color: rgb(240, 196, 140);border-radius: 50px;padding-top: 5%;">
        <div class=" row" style="width: 100%; margin-left: -62%;margin-top: -10%;">
            <div class=" col-12">
                <div class=" container-fluid" style="width: 230%;">
                    <div class=" row"
                         style="background-color: rgb(255, 253, 246); padding: 8% 20% 10% 20%;border-radius: 40px;box-shadow: 2px 2px 20px 5px rgba(88, 61, 38, 0.432);">
                        <div class=" col-12" style="text-align:center;">

                            <?php
                            if($retval){
                                echo "<h2>注册成功！转到登录页面</h2>";
                                $url = "../login.html";
                                echo "<script language='javascript'type='text/javascript'>";

                                echo "setTimeout(\"window.location.href='$url'\", 1000);";
                                echo "</script>";

                            }else{
                                echo "<h2>注册失败！</h2>";
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>











