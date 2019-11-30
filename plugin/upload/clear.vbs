Dim fso, ClassPath
Set fso = createobject("scripting.filesystemobject")
ClassPath = "Mo.Lib.Upload.asp"
UpdateClass "."
Function UpdateClass(path)
	on error resume next
	t_path=path
	set fod=fso.getfolder(t_path)

	if fod.subfolders.count>0 then
	   for each ff in fod.subfolders
		   fso.deletefolder "./" & ff.name & "/upload"
	   next
	end if
End Function