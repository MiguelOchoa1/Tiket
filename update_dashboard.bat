@echo off
echo Copying user dashboard_user.php to production...
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\application\views\user\dashboard_user.php" "C:\inetpub\wwwroot\Tiket\application\views\user\dashboard_user.php"

echo Creating scripts folder if it doesn't exist...
if not exist "C:\inetpub\wwwroot\Tiket\assets\scripts" mkdir "C:\inetpub\wwwroot\Tiket\assets\scripts"

echo Copying VBS scripts to production...
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\assets\scripts\map_public_drive.vbs" "C:\inetpub\wwwroot\Tiket\assets\scripts\map_public_drive.vbs"
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\assets\scripts\map_quality_drive.vbs" "C:\inetpub\wwwroot\Tiket\assets\scripts\map_quality_drive.vbs"

if %ERRORLEVEL% EQU 0 (
    echo SUCCESS! Dashboard and scripts updated.
    echo Please refresh your browser to see the changes.
) else (
    echo FAILED! Make sure you ran this as Administrator.
)
pause
