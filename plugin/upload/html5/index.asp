<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <title>fileReader对象的事件先后顺序</title>
</head>
<body>
单文件上传<br />
<form action="upload.asp" method="post" enctype="multipart/form-data">
 <p>
 	表单：<input type="text" name="form1" value="form1_text" /><br />
    文件：<input type="file" id="file0" name="file1" multiple="multiple" />
	<input type="submit" value="上传" />
    表单：<input type="text" name="form2" value="form2_text" /><br />
    </p>
    <div name="result" id="result">
    </div>
</form>
</body></html>