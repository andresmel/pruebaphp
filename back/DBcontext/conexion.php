<?php


class conection{

static $host="localhost";
static $user="id19779466_andres";
static $pass="Krizalid891011-";
static $db="id19779466_pruebaphp";
static $con ;

public static function connect(){
  $con=mysqli_connect(self::$host,self::$user,self::$pass,self::$db);
  if($con){
  
    return $con;

  }else{
    
    return mysqli_connect_error();
  }


}

}