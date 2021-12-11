<?php

class db
{
    private static $instance = NULL;
    public static function get() //singleton
    {
        if(!isset(self::$instance))
        {
            $host="localhost";
            $name="offres";
            $un="root";
            $pw="";
            try{
                self::$instance = new PDO("mysql:host=$host;dbname=$name","$un","$pw");
			}catch(Exception $e){
				die ('Error : '.$e->getMessage());
            }
        }

        return self::$instance;

    }
 
}

?>