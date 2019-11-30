<!--#include file="UpLoad_Class.asp"-->
<%
dim upload,iserr,id,qid,desc,str
iserr = false
id = 0
qid = 0
desc = ""
set upload = new AnUpLoad
upload.Exe = "jpg|bmp|jpeg|gif|png"
upload.MaxSize = 1 * 1024 * 1024 '2M
upload.GetData()
if upload.ErrorID>0 then 
	iserr = true
	desc = upload.Description
else
	dim file,savpath
	savepath = "upload"
	set file = upload.files("file")
	id = upload.forms("pid")
	qid = upload.forms("que")
	if file.isfile then
		result = file.saveToFile(savepath,0,true)
		if result then
			desc = file.filename
		else
			iserr = true
			desc = file.Exception
		end if
	else
		iserr = true
		desc = "没有上传文件"
	end if
end if
set upload = nothing
%>
<script type="text/javascript">
window.parent.setStep(<%=lcase(iserr)%>,'<%=replace(desc,"'","\'")%>');
</script>