<?php
$serverName = "MLKDBS20\MLKDBS20";
$database = "Ticketing_System";

// Suppress warnings
sqlsrv_configure('WarningsReturnAsErrors', 0);

$connectionInfo = array(
    "Database" => $database,
    "ReturnDatesAsStrings" => true
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn) {
    // Test basic query
    $sql = "SELECT * FROM users WHERE username = ?";
    echo "Testing query: $sql\n\n";
    
    $params = array('admin.demo');
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if($stmt === false) {
        echo "Query failed:\n";
        print_r(sqlsrv_errors());
    } else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if($row) {
            echo "User found!\n";
            echo "Username: " . $row['username'] . "\n";
            echo "Status: " . $row['status'] . "\n";
        } else {
            echo "No user found with username 'admin.demo'\n";
        }
        sqlsrv_free_stmt($stmt);
    }
    
    sqlsrv_close($conn);
}
?>
