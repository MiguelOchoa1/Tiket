-- Run this in SQL Server Management Studio on mlksec01
USE [Ticketing_System];
GO

-- Create login for IIS AppPool user
CREATE LOGIN [IIS APPPOOL\TiketPool] FROM WINDOWS;
GO

-- Grant access to database
CREATE USER [IIS APPPOOL\TiketPool] FOR LOGIN [IIS APPPOOL\TiketPool];
GO

-- Grant permissions
ALTER ROLE db_datareader ADD MEMBER [IIS APPPOOL\TiketPool];
ALTER ROLE db_datawriter ADD MEMBER [IIS APPPOOL\TiketPool];
GO

PRINT 'IIS AppPool user granted access to Ticketing_System database';
