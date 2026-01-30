'Define some variables for method usage
Dim objNetwork, strRemoteShare, driveLetter, objShell, filesys
Set objNetwork = WScript.CreateObject("WScript.Network")
strComputer = "."
Set objWMIService = GetObject("winmgmts:\\" & strComputer & "\root\cimv2")
Set colItems = objWMIService.ExecQuery _
    ("Select * from Win32_MappedLogicalDisk")
Set filesys = CreateObject("Scripting.FileSystemObject")
Set objShell = CreateObject("Shell.Application")
	
'first check if we already have the new drive mapped, and exit if
For Each objItem in colItems
If StrComp("\\10.20.2.121\Public", objItem.ProviderName) Then
Else
	If objItem.DeviceID = "H:" then
	Else
	objNetwork.RemoveNetworkDrive objItem.DeviceID, true, true
	End if
End If
Next

'if it is not mapped, we are going to delete whatever it is on the H: drive to make space
driveLetter = "H:"
If filesys.DriveExists(driveLetter) Then  
   objNetwork.RemoveNetworkDrive driveLetter, true, true
End If 

Wscript.Echo "Click OK to continue."

'now we map the new location of the new drive
strRemoteShare = "\\10.20.2.121\Public"
objNetwork.MapNetworkDrive driveLetter, strRemoteShare, True
objShell.NameSpace(driveLetter).Self.Name = "Public (\\USpharmaltd.com)"
Wscript.Echo "The " & driveLetter & " drive has been mapped to your computer, please go to start menu, open Computer and verify that the " & driveLetter & " Drive has been mapped and verify access to it. If you have any issues contact Ariel."
