单文件上传<br />
<form action="upload.asp" method="post" enctype="multipart/form-data">
复选框：<input type="checkbox" name="c1" value="1" />1 <input type="checkbox" name="c1" value="2" />2
<input type="checkbox" name="c1" value="" />3<br />
单选框：<input type="radio" name="r1" value="1" />1<input type="radio" value="2" name="r1" />2<br />
文件：<input type="file" name="file1" /> <input type="submit" value="上传" />
</form>