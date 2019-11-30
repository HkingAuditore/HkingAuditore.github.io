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
	dim file,savpath
	savepath = "upload"
	set file = upload.files("file1")
	if file.isfile then
		result = file.saveToFile(savepath,0,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
		else
			response.Write file.Exception
		end if
	end if
	
	set file = upload.files("file2")
	if file.isfile then
		result = file.saveToFile(savepath,1,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
		else
			response.Write file.Exception
		end if
	end if
	
	set file = upload.files("file3")
	if file.isfile then
		file.UserSetName = "jo-test"
		result = file.saveToFile(savepath,-1,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
		else
			response.Write file.Exception
		end if
	end if
	
	set file = upload.files("file4")
	if file.isfile then
		result = file.saveToFile(savepath,1,false)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节"
		else
			response.Write file.Exception
		end if
	end if
	
	set file = nothing
end if
set upload = nothing
%>