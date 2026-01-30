-- Grant IIS Application Pool Access to SQL Server
-- Run this in SQL Server Management Studio

USE [Ticketing_System];
GO

-- Replace 'DefaultAppPool' with your actual Application Pool name if different
-- Common names: DefaultAppPool, IIS APPPOOL\DefaultAppPool, or your custom pool name

-- For IIS Application Pool (choose the one that matches your setup):
-- Option 1: If using DefaultAppPool
CREATE USER [IIS APPPOOL\DefaultAppPool] FOR LOGIN [IIS APPPOOL\DefaultAppPool];
GO

-- Option 2: If using a custom Application Pool, replace 'YourAppPoolName' with actual name
-- CREATE USER [IIS APPPOOL\YourAppPoolName] FOR LOGIN [IIS APPPOOL\YourAppPoolName];
-- GO

-- Grant db_owner permissions to the Application Pool user
ALTER ROLE [db_owner] ADD MEMBER [IIS APPPOOL\DefaultAppPool];
GO

PRINT 'IIS Application Pool granted access to Ticketing_System database.';
GO
