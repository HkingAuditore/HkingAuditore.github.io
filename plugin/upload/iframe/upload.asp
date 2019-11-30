<!--#include file="UpLoad_Class.asp"-->
<%
if lcase(request.ServerVariables("REQUEST_METHOD"))="post" then
dim upload
set upload = new AnUpLoad
upload.Exe = "jpg|bmp|jpeg|gif|png"
upload.MaxSize = 2 * 1024 * 1024 '2M
upload.GetData()
if upload.ErrorID>0 then 
	response.Write upload.Description
else
	dim file,savpath
	savepath = "upload"
	set file = upload.files("file1")
	if file.isfile then
		result = file.saveToFile(savepath,0,true)
		if result then
			msg = file.filename
		else
			msg = file.Exception
		end if
	end if
end if
set upload = nothing
%>
<a href="upload.asp">重新上传</a>
<script>window.parent.backfn.apply(this,["<%=msg%>"]);</script>
<%else%>
<form action="upload.asp" method="post" enctype="multipart/form-data" target="upload" id="upfrm"> 
文件 <input type="file" name="file1" /> <input type="submit" value="上传" /><br />
</form>
<%end if%>