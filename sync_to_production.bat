@echo off
echo ========================================
echo Syncing ALL changes to production...
echo ========================================

echo.
echo Copying application folder...
robocopy "C:\Users\mlkdbs03\Documents\Tiket\application" "C:\inetpub\wwwroot\Tiket\application" /E /XO /R:1 /W:1 /NP /NDL

echo.
echo Copying assets folder...
robocopy "C:\Users\mlkdbs03\Documents\Tiket\assets" "C:\inetpub\wwwroot\Tiket\assets" /E /XO /R:1 /W:1 /NP /NDL

echo.
echo Copying root files...
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\*.php" "C:\inetpub\wwwroot\Tiket\" 2>nul
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\*.config" "C:\inetpub\wwwroot\Tiket\" 2>nul
copy /Y "C:\Users\mlkdbs03\Documents\Tiket\web.config" "C:\inetpub\wwwroot\Tiket\" 2>nul

echo.
echo ========================================
echo SYNC COMPLETE!
echo ========================================
echo Please refresh your browser (Ctrl+F5)
pause
