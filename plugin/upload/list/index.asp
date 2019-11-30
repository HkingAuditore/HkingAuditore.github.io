<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>DEMO</title>
<style type="text/css">

#FileList{ width:400px; border:1px #666 solid; padding:5px; background-color:#efefef; font-size:12px; font-family:宋体}
#FileList form{ margin:0; padding:0}
.list{ border:1px #ddd solid; background-color:#fff; padding:3px; margin:2px 0; line-height:18px}
.tips{ color:red}
</style>
<script type="text/javascript">
/*
Created by anlige，1034555083，zhanghuiguoanlige@126.com
*/
var fileCount=0;
var fileQuene=[];
var currentIndex=0;
function doSomething(fil){
	if(fil!=null){
		fileCount ++;
		var list = fil.parentNode.parentNode;
		list.id="file_" + fileCount;
		
		var frm = fil.parentNode;
		frm.className = "hasFile";
		frm["pid"].value=fileCount;
		frm.style.display="none";
		
		var newV = document.createElement("div");
		var fname=fil.value.replace(/\//igm,"\\").split("\\");
		newV.innerHTML="<div class=\"filename\">" + fname[fname.length-1] + "</div><div class=\"tips\" id=\"tabs" + fileCount + "\">等待上传...</div>";
		list.appendChild(newV);
	}
	var newFile = document.createElement("div");
	newFile.className = "list";
	newFile.innerHTML="<form action=\"upload.asp\" method=\"post\" enctype=\"multipart/form-data\" target=\"uploadfrm\"><input onchange=\"doSomething(this);\" class=\"file\" type=\"file\" name=\"file\" /><input type=\"hidden\" name=\"pid\" value=\"0\" /> <input type=\"hidden\" name=\"que\" value=\"0\" /> <input class=\"but\" type=\"button\" onclick=\"doUpload();\" value=\"上传\" /></form>";
	document.getElementById("FileList").appendChild(newFile);
}
function doUpload(){
	var files = document.getElementById("FileList");
	var forms = files.getElementsByTagName("form");
	if(forms.length==1){alert("请添加文件");return;}
	var k=0;
	for(var i=0;i<forms.length;i++){
		var frm = forms[i];
		if(frm.className=="hasFile"){
			frm["que"].value=k;
			k++;
			fileQuene.push(frm);
		}
	}
	_doUpload();
}
function _doUpload(){
	if(currentIndex>=fileQuene.length){
		document.getElementById("FileList").lastChild.innerHTML="全部上传完毕";
		fileQuene=[];return;
	}
	document.getElementById("tabs"+fileQuene[currentIndex]["pid"].value).innerHTML="正在上传...";
	fileQuene[currentIndex].submit();
}
function setStep(iserr,desc){
	var obj = document.getElementById("tabs"+fileQuene[currentIndex]["pid"].value);
	if(iserr){
		desc = "上传失败：" + desc;
	}else{
		desc = "上传成功：" + desc;
		obj.style.color="green";
		obj.style.fontWeight="bold";
	}
	obj.innerHTML=desc;
	currentIndex++;
	_doUpload(currentIndex);
}
window.onload=function(){doSomething(null);}
</script>
</head>
<body>
<div id="FileList"></div>
<iframe src="about:blank" width="0" height="0" frameborder="0" name="uploadfrm"></iframe>
</body>
</html>