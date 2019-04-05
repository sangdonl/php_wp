<?php

//Used to throw mysqli_sql_exceptions for database errors instead or printing them to the screen.
mysqli_report(MYSQLI_REPORT_STRICT);
/**
 * Abstract data access class. Holds all of the database connection information, and initializes a mysqli object
 * on instantiation.
 * 
 * @author Matt
 */
class AbstractDAO {
    protected $mysqli;

    protected static $DB_HOST = "127.0.0.1"; // Host address for the database 
    protected static $DB_USERNAME = "wp_eatery"; // Database username
    protected static $DB_PASSWORD = "password"; // Database password
    protected static $DB_DATABASE = "wp_eatery"; // Name of database
    
    /*
     * Constructor. Instantiates a new MySQLi object.
     * Throws an exception if there is an issue connecting
     * to the database.
     */
    function __construct() {
        try {
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        } catch(mysqli_sql_exception $e) {
            throw $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }
    
}

?>
