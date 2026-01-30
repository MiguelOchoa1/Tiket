-- SQL Server Migration from MySQL
-- Database: Ticketing_System
-- Generated: Converted from tiket_demo.sql

USE [Ticketing_System];
GO

-- --------------------------------------------------------
-- Table structure for table [attachments]
-- --------------------------------------------------------

IF OBJECT_ID('attachments', 'U') IS NOT NULL DROP TABLE [attachments];
GO

CREATE TABLE [attachments] (
  [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
  [name] VARCHAR(100) NULL,
  [path] VARCHAR(1000) NULL,
  [uploaded_by] VARCHAR(100) NULL,
  [ref] INT NULL,
  [ext] VARCHAR(10) NULL
);
GO

-- Dumping data for table [attachments]
SET IDENTITY_INSERT [attachments] ON;
GO

INSERT INTO [attachments] ([id], [name], [path], [uploaded_by], [ref], [ext]) VALUES
(33, 'TEST.jpg', 'uploads/04012020180329-TEST.jpg', 'user.demo', 0, NULL),
(34, 'TEST.jpg', 'uploads/04012020181403-TEST.jpg', 'admin.demo', 0, NULL),
(35, 'TEST.jpg', 'uploads/04012020182353-TEST.jpg', 'agent.demo', 0, NULL),
(36, 'TEST.jpg', 'uploads/04012020183457-TEST.jpg', 'admin.demo', 0, NULL),
(37, 'dummy-img.jpeg', 'uploads/31012020125348-dummy-img.jpeg', 'agent.demo', 0, NULL),
(38, 'dummy-img.jpeg', 'uploads/31012020130215-dummy-img.jpeg', 'admin.demo', 0, NULL);
GO

SET IDENTITY_INSERT [attachments] OFF;
GO

-- --------------------------------------------------------
-- Table structure for table [messages]
-- --------------------------------------------------------

IF OBJECT_ID('messages', 'U') IS NOT NULL DROP TABLE [messages];
GO

CREATE TABLE [messages] (
  [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
  [ticket] VARCHAR(50) NOT NULL,
  [message] VARCHAR(MAX) NOT NULL,
  [data] VARCHAR(MAX) NULL,
  [owner] VARCHAR(100) NOT NULL,
  [ref] INT NOT NULL,
  [created] INT NOT NULL,
  [type] INT NULL DEFAULT 0,
  [to] VARCHAR(MAX) NULL
);
GO

-- Dumping data for table [messages]
SET IDENTITY_INSERT [messages] ON;
GO

INSERT INTO [messages] ([id], [ticket], [message], [data], [owner], [ref], [created], [type], [to]) VALUES
(265, 'TIK-TIKAJ-000107', 'Changed priority to <span class=''tik-priority'' data-value=5></span>', NULL, 'admin.demo', 0, 1578141272, 6, NULL),
(266, 'TIK-TIKAJ-000107', 'Changed assignee to <span class="user-label" data-username="agent.demo"></span>', NULL, 'admin.demo', 0, 1578141286, 8, NULL),
(267, 'TIK-TIKAJ-000107', '<p>Assigned to agent.demo</p>', 'null', 'admin.demo', 0, 1578141342, 1, NULL),
(268, 'TIK-TIKAJ-000108', 'Changed priority to <span class=''tik-priority'' data-value=10></span>', NULL, 'admin.demo', 0, 1578141861, 6, NULL),
(269, 'TIK-TIKAJ-000108', 'Changed assignee to <span class="user-label" data-username="agent.demo"></span>', NULL, 'admin.demo', 0, 1578141874, 8, NULL),
(270, 'TIK-TIKAJ-000110', 'Changed priority to <span class=''tik-priority'' data-value=5></span>', NULL, 'admin.demo', 0, 1578143379, 6, NULL),
(271, 'TIK-TIKAJ-000110', 'Changed assignee to <span class="user-label" data-username="agent.demo"></span>', NULL, 'admin.demo', 0, 1578143392, 8, NULL),
(272, 'TIK-TIKAJ-000110', 'Closed the ticket', NULL, 'admin.demo', 0, 1580306584, 3, NULL),
(273, 'TIK-TIKAJ-000110', 'Changed status to <span class=''tik-status'' data-value=100></span>', NULL, 'admin.demo', 0, 1580453440, 4, NULL),
(274, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453559, 1, NULL),
(275, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453565, 1, NULL),
(276, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453567, 1, NULL),
(277, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453573, 1, NULL),
(278, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453573, 1, NULL),
(279, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453573, 1, NULL),
(280, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453573, 1, NULL),
(281, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453573, 1, NULL),
(282, 'TIK-TIKAJ-000110', '<p>This is related to current ticket</p>', 'null', 'agent.demo', 0, 1580453574, 1, NULL),
(283, 'TIK-TIKAJ-000109', '<h2>Dummy comment header</h2><p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><p><br></p><p><strong style="color: rgb(161, 0, 0);">Following the following code:</strong></p><pre class="ql-syntax" spellcheck="false">&lt;div class="dummy__text"&gt;
  &lt;h1&gt;Dummy title here&lt;/h1&gt;
&lt;/div&gt;
</pre><p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost <u>unorthographic </u>life One day however a small line of blind text by the name of Lorem Ipsum decided to</p><p><br></p><p><br></p>', '{"attachments":[{"file_name":"dummy-img.jpeg","path":"uploads\/31012020125348-dummy-img.jpeg"}]}', 'agent.demo', 0, 1580455479, 1, NULL),
(284, 'TIK-TIKAJ-000111', 'Changed severity to <span class=''tik-severity'' data-value=5></span>', NULL, 'admin.demo', 0, 1580456207, 5, NULL);
GO

SET IDENTITY_INSERT [messages] OFF;
GO

-- --------------------------------------------------------
-- Table structure for table [tickets]
-- --------------------------------------------------------

IF OBJECT_ID('tickets', 'U') IS NOT NULL DROP TABLE [tickets];
GO

CREATE TABLE [tickets] (
  [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
  [ticket_no] VARCHAR(50) NULL,
  [owner] VARCHAR(100) NOT NULL,
  [purpose] VARCHAR(500) NULL,
  [subject] VARCHAR(100) NOT NULL,
  [message] VARCHAR(3000) NOT NULL,
  [assign_to] VARCHAR(100) NULL,
  [assign_on] VARCHAR(100) NULL,
  [progress] INT NOT NULL,
  [updated] INT NOT NULL,
  [created] INT NOT NULL,
  [status] INT NOT NULL,
  [severity] INT NULL DEFAULT 0,
  [priority] INT NULL DEFAULT 0,
  [cc] VARCHAR(MAX) NULL,
  [data] VARCHAR(MAX) NULL,
  [category] INT NULL
);
GO

-- Dumping data for table [tickets]
SET IDENTITY_INSERT [tickets] ON;
GO

INSERT INTO [tickets] ([id], [ticket_no], [owner], [purpose], [subject], [message], [assign_to], [assign_on], [progress], [updated], [created], [status], [severity], [priority], [cc], [data], [category]) VALUES
(106, 'TIK-TIKAJ-000106', 'user.demo', 'Testing', 'Dummy ticket 1', '<p>Dummy ticket 1 for demo.</p>', NULL, NULL, 0, 0, 1578140501, 0, 10, NULL, 'admin.demo;agent.demo', 'null', 0),
(107, 'TIK-TIKAJ-000107', 'user.demo', 'Testing', 'Dummy Ticket 2', '<p>Dummy ticket 2 for feature request.</p>', 'agent.demo', '1578141285991', 0, 0, 1578141217, 50, 5, 5, 'admin.demo;agent.demo', '{"attachments":[{"file_name":"TEST.jpg","path":"uploads\/04012020180329-TEST.jpg"}]}', 1),
(108, 'TIK-TIKAJ-000108', 'admin.demo', 'Testing', 'Dummy Ticket 3', '<p>Dummy ticket 3 for software troubleshooting.</p>', 'agent.demo', '1578141873859', 0, 0, 1578141850, 50, 10, 10, 'agent.demo', '{"attachments":[{"file_name":"TEST.jpg","path":"uploads\/04012020181403-TEST.jpg"}]}', 2),
(109, 'TIK-TIKAJ-000109', 'agent.demo', 'Testing', 'Dummy Ticket 4', '<p>Dummy ticket for Nertwork Problem.</p>', NULL, NULL, 0, 0, 1578142453, 0, 5, NULL, 'admin.demo', '{"attachments":[{"file_name":"TEST.jpg","path":"uploads\/04012020182353-TEST.jpg"}]}', 5),
(110, 'TIK-TIKAJ-000110', 'admin.demo', 'Testing', 'Dummy Ticket 5', '<p>Dummy ticket 5 for Hardware.</p>', 'agent.demo', '1578143391351', 0, 0, 1578143099, 100, 5, 5, 'agent.demo', '{"attachments":[{"file_name":"TEST.jpg","path":"uploads\/04012020183457-TEST.jpg"}]}', 6),
(111, 'TIK-TIKAJ-000111', 'admin.demo', 'To test a bug that is huge', 'The last [newsletter:total] posts from our blog', '<h2>Dummy comment header</h2><p><br></p><p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><p><br></p><p><br></p><p><strong>Following are points:</strong></p><p><strong><span class="ql-cursor">?</span></strong></p><ol><li><span style="color: rgb(85, 85, 85);">Point number 1</span></li><li><span style="color: rgb(85, 85, 85);">Point number 2</span></li><li><span style="color: rgb(85, 85, 85);">Point number 3</span>&nbsp;</li><li>Point number 4</li></ol><p><br></p><p><br></p><p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to</p><p><br></p><p><br></p><p><br></p>', NULL, NULL, 0, 0, 1580456068, 0, 5, NULL, 'user.demo;agent.demo', '{"attachments":[{"file_name":"dummy-img.jpeg","path":"uploads\/31012020130215-dummy-img.jpeg"}]}', 0);
GO

SET IDENTITY_INSERT [tickets] OFF;
GO

-- --------------------------------------------------------
-- Table structure for table [users]
-- --------------------------------------------------------

IF OBJECT_ID('users', 'U') IS NOT NULL DROP TABLE [users];
GO

CREATE TABLE [users] (
  [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
  [name] VARCHAR(50) NOT NULL,
  [email] VARCHAR(35) NOT NULL,
  [mobile] VARCHAR(15) NOT NULL,
  [username] VARCHAR(50) NOT NULL,
  [password] VARCHAR(50) NOT NULL,
  [type] INT NOT NULL,
  [status] INT NOT NULL,
  [created] INT NOT NULL,
  [updated] INT NOT NULL
);
GO

-- Dumping data for table [users]
SET IDENTITY_INSERT [users] ON;
GO

INSERT INTO [users] ([id], [name], [email], [mobile], [username], [password], [type], [status], [created], [updated]) VALUES
(1, 'Demo Admin', 'admin.demo@tikaj.com', '9999999999', 'admin.demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 80, 1, 1568270653, 1568270653),
(2, 'Demo User', 'user.demo@tikaj.com', '9999999999', 'user.demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 10, 1, 1569649164, 1569649164),
(3, 'Demo Agent', 'agent.demo@tikaj.com', '9999999999', 'agent.demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 60, 1, 1569649194, 1569649194);
GO

SET IDENTITY_INSERT [users] OFF;
GO

PRINT 'Database schema created successfully!';
PRINT 'Default login credentials:';
PRINT 'Admin - Username: admin.demo, Password: demo';
PRINT 'User  - Username: user.demo, Password: demo';
PRINT 'Agent - Username: agent.demo, Password: demo';
GO
