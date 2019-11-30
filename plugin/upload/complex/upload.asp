<!--#include file="UpLoad_Class.asp"-->
<%
dim upload
set upload = new AnUpLoad
upload.Exe = "*"
upload.MaxSize = 2 * 1024 * 1024 '2M
upload.GetData()
if upload.ErrorID>0 then 
	response.Write upload.Description
else
	response.Write "文本框:" & upload.forms("text1") & "<br />"
	response.Write "文本域:" & upload.forms("textarea1") & "<br />"
	dim file,savpath
	savepath = "upload"
	set file = upload.files("file1")
	if file.isfile then
		result = file.saveToFile(savepath,0,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节"
		else
			response.Write file.Exception
		end if
	end if
end if
set upload = nothing
%>