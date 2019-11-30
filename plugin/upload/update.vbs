Dim fso, ClassPath
Set fso = createobject("scripting.filesystemobject")
ClassPath = "UpLoad_Class.asp"
UpdateClass "."
Function UpdateClass(path)
	t_path=path
	set fod=fso.getfolder(t_path)

	if fod.subfolders.count>0 then
	   for each ff in fod.subfolders
		   fso.CopyFile ClassPath, t_path & "\" & ff.name & "\" & ClassPath ,true
	   next
	end if
End Function