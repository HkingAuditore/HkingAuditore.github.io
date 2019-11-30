<%response.Charset="gb2312"%>
文本和文件同时上传<br />
<form action="upload.asp" method="post" enctype="multipart/form-data">
文本框 <input type="text" name="text1" value="测试文本AaspUpload" /><br />
文本域 <textarea name="textarea1" cols="50" rows="5">sdfsdfsdfcbfd我</textarea><br />
文件 <input type="file" name="file1" /> <input type="submit" value="上传" />
</form>