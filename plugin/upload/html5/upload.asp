<!--#include file="UpLoad_Class.asp"-->
 <meta charset="utf-8" />
<%
dim upload
dim configStr
configStr ="CONFIG:"& chr(10)
set upload = new AnUpLoad
upload.Exe = "*"
upload.MaxSize = 2 * 1024 * 1024 '2M
upload.GetData()
Sub WriteToTextFile (FileUrl,byval Str,CharSet)
		set stm=server.CreateObject("adodb.stream")
		stm.Type=2 '以本模式读取
		stm.mode=3
		stm.charset=CharSet
		stm.open
			stm.WriteText str
		stm.SaveToFile server.MapPath(FileUrl),2
		stm.flush
		stm.Close
		set stm=nothing
End Sub
if upload.ErrorID>0 then 
	
	response.Write upload.Description
else
	' call WriteToTextFile("userconfig.txt",upload.Forms("username"),"utf-8")
	dim file,savpath
	savepath = "../../../users/"& upload.Forms("username")
	for each frm in upload.forms("-1")
		configStr = configStr & frm &"="& upload.forms(frm) & chr(10)
		response.Write frm & "=" & upload.forms(frm) & "<br />"
	next
	call WriteToTextFile(savepath &"/" & "userconfig.config",configStr,"utf-8")
	set file = upload.Files("file1")
	if file.isfile then
		result = file.saveToFile(savepath,0,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
		else
			response.Write file.Exception & "<br />"
		end if
	end if
	
	set file = upload.Files_Muti("file1",1)
	if file.isfile then
		result = file.saveToFile(savepath,1,true)
		if result then
			response.Write "文件'" & file.LocalName & "'上传成功，保存位置'" & server.MapPath(savepath & "/" & file.filename) & "',文件大小" & file.size & "字节<br />"
		else
			response.Write file.Exception & "<br />"
		end if
	end if
	
	Response.Write "成功保存的文件个数：" & Upload.QuickSave("file1",savepath) & "个"
end if
set upload = nothing
%>