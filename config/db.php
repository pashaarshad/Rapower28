<?php
/**
 * Database Connection Configuration
 */

// Database configuration
define('DB_HOST', '127.0.0.1;port=6565');
define('DB_NAME', 'rapower28');
define('DB_USER', 'root');
define('DB_PASS', ''); 
define('DB_CHARSET', 'utf8mb4');

/**
 * Returns a PDO instance for the database connection.
 * 
 * @return PDO
 * @throws PDOException
 */
function getDB() {
    static $pdo = null;
    
    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // If the database doesn't exist, we might want to handle it or just throw
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    return $pdo;
}
