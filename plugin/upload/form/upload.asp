<!--#include file="UpLoad_Class.asp"-->
<%
dim upload
set upload = new AnUpLoad
upload.Exe = "jpg|bmp|jpeg|gif|png|sql|txt"
upload.MaxSize = 2 * 1024 * 1024 '2M
upload.GetData()
if upload.ErrorID>0 then 
	response.Write upload.Description
else
	dim file,savpath
	savepath = "upload"
	response.Write "复选框:" & upload.forms("c1") & "<br />"
	response.Write "单选框:" & upload.forms("r1") & "<br />"
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