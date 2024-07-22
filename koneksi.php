<?php 

require_once "config.php";

// Data Source Name(DSN)
$dsn= "mysql:host=" .DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

//opsi PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Menyetel mode kesalahan ke pengecualian
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Mengatur mode fetch default ke associative array
    PDO::ATTR_EMULATE_PREPARES   => false,  // Menonaktifkan emulasi prepared statements
];

try{
    //membuat insntace PDO
    $pdo = new  PDO($dsn , DB_USER , DB_PASS , $options);
} catch (\PDOException $e) {
    // Menangkap dan menampilkan pesan kesalahan
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



?>