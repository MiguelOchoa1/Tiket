-- Create SQL Server Login and Grant Access
-- Run this in SQL Server Management Studio

USE [master];
GO

-- Create login if it doesn't exist
IF NOT EXISTS (SELECT * FROM sys.server_principals WHERE name = 'MLKDBS03')
BEGIN
    CREATE LOGIN [MLKDBS03] WITH PASSWORD = 'QAws!@12ws', 
    DEFAULT_DATABASE = [Ticketing_System],
    CHECK_POLICY = OFF,
    CHECK_EXPIRATION = OFF;
    PRINT 'Login MLKDBS03 created successfully.';
END
ELSE
BEGIN
    PRINT 'Login MLKDBS03 already exists.';
END
GO

-- Switch to your database
USE [Ticketing_System];
GO

-- Create database user for the login
IF NOT EXISTS (SELECT * FROM sys.database_principals WHERE name = 'MLKDBS03')
BEGIN
    CREATE USER [MLKDBS03] FOR LOGIN [MLKDBS03];
    PRINT 'User MLKDBS03 created in Ticketing_System database.';
END
ELSE
BEGIN
    PRINT 'User MLKDBS03 already exists in database.';
END
GO

-- Grant permissions
ALTER ROLE [db_owner] ADD MEMBER [MLKDBS03];
PRINT 'MLKDBS03 granted db_owner role.';
GO

PRINT 'Setup complete! MLKDBS03 can now access Ticketing_System database.';
GO
