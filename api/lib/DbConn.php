<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 18:59
 */

class DbConn {
    //properti
    protected static $_db;

    //method
    private function __construct()
    {
        try{
            self::$_db = new PDO('mysql:host=localhost;dbname=skripsi', 'root', '');
            self::$_db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: " . $e->getMessage();
        }
    }

    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {

//Guarantees single instance, if no connection object exists then create one.
        //if (!self::$_db) {
//new connection object.
            new dbConn();
       //}
//return connection.
        return self::$_db;
    }

} 