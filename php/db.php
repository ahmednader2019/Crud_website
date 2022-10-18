<?php
function Createdb(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'courses';
     
    // Make Connection
    $con = mysqli_connect($servername,$username,$password);
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    // Check Connection
    if(!$con){
    die('Connection Failed : '.mysqli_connect_error());
    }
    if(mysqli_query($con,$sql)){
        $con = mysqli_connect($servername,$username,$password,$dbname);
        // echo 'Database Created Successfully...!';
        $sql = "
            CREATE TABLE IF NOT EXISTS subjects(
            ID INT (11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
            course_name VARCHAR(30) NOT NULL,
            author_name VARCHAR(30) NOT NULL,
            course_price float
          );"
        ;
        if(mysqli_query($con,$sql)){
           return $con ;
        }
        else{
            echo "Cannot Create Table...!";
        }


    }else{
        echo 'Error While Creating the DataBase : '.mysqli_error($con);
    }

}
