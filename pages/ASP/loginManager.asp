<!DOCTYPE html>
 <meta charset="utf-8" />

<html lang="zh">
<%		
		function ReadFromTextFile (FileUrl,CharSet)
			dim str
			set stm=server.CreateObject("adodb.stream")
			stm.Type=2 '以本模式读取
			stm.mode=3
			stm.charset=CharSet
			stm.open
			stm.loadfromfile server.MapPath(FileUrl)
			str=stm.readtext
			stm.Close
			set stm=nothing
			ReadFromTextFile=str
		end function
		function UTF2GB(UTFStr)

			for Dig=1 to len(UTFStr)
			'如果UTF8编码文字以%开头则进行转换
			if mid(UTFStr,Dig,1)="%" then
				'UTF8编码文字大于8则转换为汉字
				if len(UTFStr) >= Dig+8 then
				GBStr=GBStr & ConvChinese(mid(UTFStr,Dig,9))
				Dig=Dig+8
				else
				GBStr=GBStr & mid(UTFStr,Dig,1)
				end if
			else
				GBStr=GBStr & mid(UTFStr,Dig,1)
			end if
			next
			UTF2GB=GBStr
			end function
		dim config,account
        account = Request.form("account")
		config = ReadFromTextFile("../../users/"&account&"/userconfig.txt","utf-8")
	%>
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newbie's Kitchen</title>
    <link href="../../../img/icon.ico" rel="icon" type="/image/x-ico" />

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/bootstrap-validator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/language/zh_CN.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <link rel="stylesheet" href="../../../css/registerCSS.css">

    <script src="../../../scripts/audioPlayer.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        });
    </script>

    <script src="../scripts/registerManager.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
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
    <img src="../../../img/Register/kit1.png" width="100%" style="position: absolute;z-index: -1;margin: 0 auto;justify-content: center;" />

    <a href="../../index.html">
        <img src="../../img/logo.png" style="position:absolute; margin-left: 0.8%; margin-top: 1%;" width="100px" />
    </a>

    <div align="right" class="mainBar" style="float: right;right: 0;width: 1300px;margin-top: 1vw;margin-right: 1vw;">
        <a href="" style="text-decoration: none;">关于我们</a>
        <a href="" style="text-decoration: none;">线上预览</a>
        <a href="" style="text-decoration: none;">预购/捐赠</a>
        <a href="" style="text-decoration: none;">开发日志</a>
        <div class="player" style="float:right;margin-right: 3%;margin-top: -0.1%;">
            <div class="play" id="player" onclick="Player()">
                <audio id="BGM" loop="" preload="">
                    <source src="../../../music/做菜2无损完整 (1).mp3" />
                </audio>
            </div>
        </div>
    </div>

</header>

<body>

    <div class="container-fluid" style="top: 15vw;position: absolute;background-color: cornflowerblue;">
        <div class="row" style="background-color: blue; margin-right: 0;">
            <div class=" col-2 offset-4">
                <img src="../../../img/Register/组 1.png" width="200%" style="position: absolute;left: 0%;z-index: 5; margin-top: 10%;" />
            </div>


        </div>



        <div class="container-fluid " style="position: absolute; top:12vw; padding-left: 30%; padding-right: 30%; left: 0;background-color: rgb(240, 196, 140);border-radius: 50px;padding-top: 5%;">
            <div class=" row" style="width: 100%; margin-left: -62%;margin-top: -10%;">
                <div class=" col-12">
                    <div class=" container-fluid" style="width: 230%;">
                        <div class=" row" style="background-color: rgb(255, 253, 246); padding: 8% 20% 10% 20%;border-radius: 40px;box-shadow: 2px 2px 20px 5px rgba(88, 61, 38, 0.432);">
                            <div class=" col-12">
                                <%

								config = split(config,"|")
								dim username,email,gender,classname,favor,pwd,edition,enableemail
								username = config(1)
								username  = split(username,"=")
								email = config(2)
								email = split(email,"=")
								gender = config(3)
								gender = split(gender,"=")
								classname = config(4)
								classname = split(classname,"=")
								favor = config(5)
								favor = split(favor,"=")
								pwd = config(6)
								pwd = split(pwd,"=")
								edition = config(7)
								edition = split(edition,"=")
								enableemail = config(8)
								enableemail = split(enableemail,"=")

								if Request.form("pwd")=pwd(1) then
                                    response.write ("您的用户名是："&username(1)&"<br/>")
                                    response.write ("您的邮箱是："&email(1)&"<br/>")
                                    response.write ("您的头像是：<br/><img src='../../users/" & account & "/header.jpg'/><br/>")
                                    response.write ("您的性别是："&gender(1)&"<br/>")
                                    response.write ("您的班级是："&classname(1)&"<br/>")
                                    response.write ("您的偏好是："&favor(1)&"<br/>")
                                    response.write ("您的密码是："&pwd(1)&"<br/>")
                                    response.write ("您的版本是："&edition(1)&"<br/>")
                                    response.write ("您"&enableemail(1)&"了发送邮件<br/>")
                                else
                                    response.write("密码错误！<br/>")
                                end if

								%>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>










 
