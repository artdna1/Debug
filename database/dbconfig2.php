<?php
try {
    // Check if the server is running on localhost
    if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1') {
        // Localhost connection with correct port syntax
        $dsn = "mysql:host=127.0.0.1;port=3306;dbname=magrent";
        $pdoConnect = new PDO($dsn, "root", "");
    } else {
        // Live server connection
        $dsn = "mysql:host=localhost;dbname=u297724503_magrent_2023";
        $pdoConnect = new PDO($dsn, "u297724503_magrent_2023", "Magrent_2023");
    }

    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exc) {
    echo "Connection error: " . $exc->getMessage();
    exit();
}
?>
