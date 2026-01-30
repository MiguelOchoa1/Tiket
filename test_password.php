<?php
$serverName = "MLKDBS20\MLKDBS20";
$database = "Ticketing_System";

sqlsrv_configure('WarningsReturnAsErrors', 0);
$conn = sqlsrv_connect($serverName, array("Database" => $database, "ReturnDatesAsStrings" => true));

if($conn) {
    $sql = "SELECT username, password FROM users WHERE username = 'admin.demo'";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    
    echo "Admin user password hash: " . $row['password'] . "\n\n";
    
    // Check what the hash should be
    echo "Expected hash for 'demo': " . md5('demo') . "\n";
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
