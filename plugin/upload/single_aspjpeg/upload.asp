<!--#include file="UpLoad_Class.asp"-->
<%
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
		jo_Canvas file.getbytes(),server.MapPath("upload/" & file.newname)
		response.Write "水印添加成功"
	end if
end if
set upload = nothing

function jo_Canvas(data,savepath)
	'加载原始图片
	Set jpeg = Server.CreateObject("Persits.Jpeg")
	jpeg.RegKey="48958-77556-02411"
	jpeg.OpenBinary data
	width = jpeg.width
	height= jpeg.height
	jpeg.Quality=100

	'加载水印图片
	set jpeg1 = Server.CreateObject("Persits.Jpeg")
	jpeg1.RegKey="48958-77556-02411"
	jpeg1.open server.MapPath("cloud1.jpg")  '水印图片
	jpeg1.Quality=100
	w1 = jpeg1.width
	h1 = jpeg1.height
	jpeg.DrawImage (width-w1-20),(height-h1-20),jpeg1,0.5,&Hff0000   '数字20为右边距和下边距
	jpeg1.close
	set jpeg1 = nothing
	
	'水印文字
	jpeg.Canvas.font.color=&HFFFFFF   '字体颜色
	jpeg.Canvas.font.Family = "宋体"   '字体
	jpeg.Canvas.font.ShadowColor = &H000000   '阴影颜色
	jpeg.Canvas.font.ShadowXoffset = 1   '阴影偏移
	jpeg.Canvas.font.ShadowYoffset = 1   '阴影偏移
	jpeg.Canvas.font.Bold = false    '是否粗体
	jpeg.Canvas.font.size= 14   '字体大小
	text = "http://www.eb.com.cn/" '水印文字
	jpeg.Canvas.Printtext (width-152-20),(height-fontsize-20),text   '152为水印文字的宽度，20右边距和下边距

	jpeg.save savepath '保存到文件夹
	jpeg.close
	set jpeg=nothing
end function
%>