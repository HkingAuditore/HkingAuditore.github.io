<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newbie's Kitchen</title>

    <link href="../../img/icon.ico" rel="icon" type="image/x-ico"/>
    <!--    <link rel="shortcut icon" href=" WebGL/TemplateData/favicon.ico">-->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/bootstrap-validator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/core.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/language/zh_CN.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <link href="../../css/message.css" rel="stylesheet"/>
    <script src="../../scripts/audioPlayer.js"></script>
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
    <?php
    $isSign = 0;
    if (isset($_COOKIE["account"])) {
        $account = $_COOKIE["account"];
        $conn = mysqli_connect('localhost:3306', 'root', '59951308');
        mysqli_query($conn, "set names utf8");
        $sql = "SELECT *
                FROM userdata.userinfo
                WHERE account ='$account';";
        mysqli_select_db($conn, "userdata");
        $retval = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        mysqli_close($conn);
        $isSign = 1;
    } else {
        $isSign = 0;
    }
    ?>
    <?php
    if (!empty($_POST["message_sent"])) {
        $content = $_POST["message_sent"];
        if (!empty($content) && !empty($account)) {
            $conn = mysqli_connect('localhost:3306', 'root', '59951308');
            mysqli_query($conn, "set names utf8");
            mysqli_set_charset($conn, "utf8mb4");

            $sql =  "INSERT INTO message.messagetable " .
                    "(messageUser,messageContent,messageDate) " .
                    "VALUES " .
                    "('$account','$content',NOW())";

            mysqli_select_db($conn, 'userdata');
            $retval = mysqli_query($conn, $sql);
            mysqli_close($conn);
            $content = "";
            header("Location: {$_SERVER['REQUEST_URI']}");
        }
    }
    ?>


    <script>
        var userData =
            <?php
            echo json_encode($row);
            ?>
        ;
    </script>
</head>


<header style="height: 51vw;">

    <div class="container-fluid">
        <div class="row" style="height: 2vw;">
            <div class="col-1">
                <a href="../../index.html">
                    <img src="../../img/logo.png" style="position:absolute;
                            margin-left: 0.8%; margin-top: 1vw;" width="100px"/>
                </a>
            </div>
            <div class="col-8 offset-4">
                <div align="right" class="mainBar" style="margin-top: 1vw;">
                    <a href="userInfo.php" style="text-decoration: none;">个人面板</a>
                    <a href="../art.html" style="text-decoration: none;">艺术设定</a>
                    <a href="message.php" style="text-decoration: none;">留言板</a>
                    <a href="../devLog.php" style="text-decoration: none;">开发日志</a>
                    <div class="player" style="float:right;margin-right:
                            3%;margin-top: -0.1%;">
                        <div class="play" id="player" onclick="Player()">
                            <audio id="BGM" loop="" preload="">
                                <source src="../../music/做菜2无损完整 (1).mp3"/>
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10%;overflow: hidden;padding-bottom: 10%;padding-top: 10%;">
            <div class="col-12" style="margin-left: 55%;">
                <div style="width:75%;">
                    <h1 class="frostedGlass mainTitle">
                        <span style="margin-left: 8%;">
                            留言板
                        </span>
                    </h1>
                </div>
            </div>
            
        </div>
    </div>
</header>

<body>
<div class="container-fluid">

    <?php
    $conn = mysqli_connect('localhost:3306', 'root', '59951308');
    mysqli_query($conn, "set names utf8");
    mysqli_set_charset($conn, "utf8mb4");
    $sql = "SELECT *
            FROM message.messagetable a
            LEFT JOIN userdata.userinfo b ON a.messageUser=b.account
            ORDER BY a.messageID DESC;";
    mysqli_select_db($conn, 'message');
    $retval = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        echo "    <div class=\"row message\"  >
        <div class=\"col-12 message-inside\">
            <div class=\"row\" >
                <div class=\"col-3 avatar\">
                    <img src=\"../../users/" . $row["messageUser"] . ".jpg\" width=\"50%\">
                </div>
                <div class=\"col-9\">
                    <div class=\"row\">
                        <div class=\"col-6 user-name\">
                            " . $row["username"] . "
                        </div>
                        <div class=\"col-6 date\">
                            " . $row["messageDate"] . "
                        </div>
                    </div>
                    <div class=\"row message-content\">
                        <div class=\"col-12\">
                            " . $row["messageContent"] . "
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>";
    }


    mysqli_free_result($retval);
    mysqli_close($conn);

    ?>
    <?PHP
    if(isset($_COOKIE["account"]) && !($_COOKIE["account"] === "null")) {
            echo "    <form class=\"needs-validation\" action id=\"form-message\" method=\"post\" name=\"messageForm\">
            <div class=\" form-group\">   
                <div class=\"row text-area\">
                    <div class=\" col-12\">              
                        <label for=\"message_sent1\">留言:</label>
                        <textarea class=\"form-control\" id=\"message_sent\" name=\"message_sent\" rows=\"3\" required></textarea>    
                    </div>
                </div>
                <div class=\" row\">
                    <div class=\" col-2 offset-8\" style=\"padding-left: 2%;padding-right:4%\">
                        <button type=\"submit\" class=\"btn custom-confirm-btn\">发送</button>
                    </div>
                </div>
            </div>
        </form>";
    }else{
        echo "<div class=\"row\" style=\"padding-top:5%;padding-bottom:5%;\">
            <div class=' col-12' style='padding-left:20%;padding-right:20%;text-align: center' >
            <div class=\"alert alert-warning\" role=\"alert\"> 
                <a href='../login.html'>登录</a> 后可留言!
            </div>
            </div>
            </div>";
    }
    ?>
</div>
</body>


</html>