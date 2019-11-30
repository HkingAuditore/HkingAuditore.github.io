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
	dim savpath
	savepath = "upload"
	for each f in upload.files(-1)
		dim file
		set file = upload.files(f)
		if file.isfile then
			result = file.saveToFile(savepath,0,true)
			if result then
				response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
			else
				response.Write file.Exception
			end if
		else
			response.Write f & "<br />"
		end if
		set file = nothing
	next
end if
set upload = nothing
%>