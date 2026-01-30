<?php
$serverName = "MLKDBS20\MLKDBS20";
$database = "Ticketing_System";

sqlsrv_configure('WarningsReturnAsErrors', 0);
$conn = sqlsrv_connect($serverName, array("Database" => $database, "ReturnDatesAsStrings" => true));

if($conn) {
    $sql = "SELECT username, status FROM users";
    $stmt = sqlsrv_query($conn, $sql);
    
    echo "Users in database:\n";
    echo "==================\n";
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "Username: " . $row['username'] . " | Status: " . $row['status'] . "\n";
    }
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
