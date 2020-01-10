<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newbie's Kitchen</title>

    <link href="../img/icon.ico" rel="icon" type="image/x-ico" />
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
    <link href="../css/devLog.css" rel="stylesheet" />
    <script src="../scripts/indexJS.js"></script>
    <script src="../scripts/audioPlayer.js"></script>
    <script src="../scripts/jquery.cookie.js"></script>

    <!-- <script src="../plugin/showdown-1.9.1/dist/showdown.js"></script> -->
    <script src="../scripts/marked.js"></script>
    <!-- <script src="https://cdn.bootcss.com/mermaid/8.3.1/mermaid.core.js"></script> -->
    <script src="https://cdn.bootcss.com/mermaid/8.3.1/mermaid.js"></script>
    <script src="../scripts/mermaidAPI.js"></script>
    <script>
        mermaidAPI.initialize({
            startOnLoad: true,
            flowchart: {
                useMaxWidth: false,
                htmlLabels: true
            }
        });
    </script>

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({ showProcessingMessages: false, messageStyle: "none", extensions: ["tex2jax.js"], jax: ["input/TeX", "output/HTML-CSS"], tex2jax: { inlineMath: [ ["$", "$"] ], displayMath: [ ["$$","$$"] ], skipTags: ['script', 'noscript', 'style',
        'textarea', 'pre','code','a'], ignoreClass:"comment-content" }, "HTML-CSS": { availableFonts: ["STIX","TeX"], showMathMenu: false }})
    </script>
    <script type="text/javascript" src="https://cdn.bootcss.com/mathjax/2.7.6/MathJax.js?config=default"></script>



    <link href="../css/markdown.css" rel="stylesheet">
    <link href="../plugin/highLight/styles/atom-one-dark-reasonable.css" rel="stylesheet">
    <script src="../plugin/highLight/highlight.pack.js"></script>
    <script src="https://cdn.bootcss.com/highlightjs-line-numbers.js/2.7.0/highlightjs-line-numbers.js"></script>

    <script>
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
    </script>
    <script>
        function showMarkdown(target) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject('Microsoft.XMLHttp');
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // var converter = new showdown.Converter({
                    //         tables: true
                    //     }) // 初始化转换器

                    document.querySelector("div[aria-labelledby='" + target + "']").innerHTML = marked(xmlhttp.responseText);
                    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                    // console.log(marked(xmlhttp.responseText));
                    document.querySelectorAll('pre code').forEach((block) => {
                        hljs.highlightBlock(block);
                        hljs.lineNumbersBlock(block);
                    });

                }
            }

            xmlhttp.open('GET', "../devLogs/" + target + ".md", true);
            // console.log("../devLogs/" + target + ".md");
            xmlhttp.send();




        }
    </script>
</head>


<header style="height: 51vw;">

    <div class="container-fluid">
        <div class="row" style="height: 2vw;">
            <div class="col-1">
                <a href="../index.html">
                    <img src="../img/logo.png" style="position:absolute;
                            margin-left: 0.8%; margin-top: 1vw;" width="100px" />
                </a>
            </div>
            <div class="col-8 offset-4">
                <div align="right" class="mainBar" style="margin-top: 1vw;">
                    <a href="PHP/userInfo.php" style="text-decoration: none;" id="panel">个人面板</a>
                    <a href="art.html" style="text-decoration: none;">艺术设定</a>
                    <a href="PHP/message.php" style="text-decoration: none;">留言板</a>
                    <a href="devLog.php" style="text-decoration: none;">开发日志</a>
                    <div class="player" style="float:right;margin-right:
                            3%;margin-top: -0.1%;">
                        <div class="play" id="player" onclick="Player()">
                            <audio id="BGM" loop="" preload="">
                                <source src="../music/做菜2无损完整 (1).mp3" />
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
                            开发日志
                        </span>
                    </h1>
                </div>
            </div>

        </div>
    </div>
</header>

<body>

    <div class="container-fluid" id="devLogs">
        <div class="row" style="padding-bottom: 20%;">
            <div class="col-xl-2 col-md-2" style="padding-left: 0; ;">
                <div class=" sideBar" style="margin-top: -1.8vw;padding-top: 12%;width: 80%">
                    <div class="list-group" id="logList" role="tablist">
                        <?php
                        $conn = mysqli_connect('localhost:3306', 'root', '59951308');
                        mysqli_query($conn, "set names utf8");
                        $sql = "SELECT *
                        FROM devlogs.logs
                        ORDER BY logID DESC;";
                        mysqli_select_db($conn,'devlogs');
                        $retval = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
                        echo "<a class=\"list-group-item list-group-item-action active\" id=\"" .$row["logID"]."-list\" data-toggle=\"list\" href=\"#list-".$row["logID"]."\" role=\"tab\" aria-controls=\"".$row["logID"]."\">".$row["logName"]."</a>";
                        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                            echo "<a class=\"list-group-item list-group-item-action\" id=\"" .$row["logID"]."-list\" data-toggle=\"list\" href=\"#list-".$row["logID"]."\" role=\"tab\" aria-controls=\"".$row["logID"]."\">".$row["logName"]."</a>";
                        }

//                        mysqli_free_result($retval);
//                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-md-10" style="padding-top: 3%;">
                <div id="logTitle" class=" logTitle">
                    最新日志
                </div>
                <hr>
                <div class=" author" id=" author">
                    @HkingAuditore
                </div>
                <hr>




                <div class="tab-content markdown-body" id="nav-tabContent">
                    <?php
                    $sql = "SELECT *
                        FROM devlogs.logs
                        ORDER BY logID DESC;";
                    mysqli_select_db($conn,'devlogs');
                    $retval = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
                    echo "<div class=\"tab-pane fade show active\" id=\"list-".$row["logID"]."\" role=\"tabpanel\" aria-labelledby=\"".$row["logID"]."\">".$row["logID"]."</div>";
                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                        echo "<div class=\"tab-pane fade show\" id=\"list-".$row["logID"]."\" role=\"tabpanel\" aria-labelledby=\"".$row["logID"]."\">".$row["logID"]."</div>";
                    }

                    mysqli_free_result($retval);
                    mysqli_close($conn);

                    ?>
                </div>
            </div>

        </div>
    </div>





</body>
<script>
    var activeTab=$(".active").attr('aria-controls');
    $(function() {
        showMarkdown($(".active").attr('aria-controls'));
    })

    // 点选时各自读取md文件
    $('a[data-toggle="list"]').on('show.bs.tab', function(e) {
        $(e.target).animate({
            paddingLeft: '20%'
        }, {
            duration: 800,
            easing: 'easeOutElastic',
        });
        $(e.relatedTarget).animate({
            paddingLeft: '10%'
        }, {
            duration: 800,
            easing: 'easeOutElastic',
        });
        activeTab = $(e.target).attr('aria-controls');
        $(".logTitle").html($(e.target).html());
        $('html, body').animate({
                scrollTop: $('#devLogs').offset().top
            }, 300)
            // console.log($('.tab-content div[aria-labelledby="' + activeTab + '"').html("我拿到了！"));
            // $(e.target).tab('show');
        showMarkdown(activeTab);
    });
    $('a[data-toggle="list"]').on('shown.bs.tab', function(e) {
        mermaid.init({
            noteMargin: 10
        }, ".mermaid");
    });
    $("#logTitle").click(function () {
        var url = "devlogShow.html?log="+activeTab+"&name="+encodeURI(encodeURI($("#logList>.active").text()));
        console.log(url);
        window.location.href = url;
    });
    $(function() {
        console.log($.cookie('account'));
        if ($.cookie('account') == undefined) {
            $("#panel").text("登录");
        }
    })
</script>


</html>