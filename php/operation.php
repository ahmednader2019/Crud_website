<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

// create button click 

if(isset($_POST['create'])){
    insertData();
}
if(isset($_POST['read'])){
    getData();
}
if(isset($_POST['update'])){
    updateData();
}
if(isset($_POST['delete'])){
    deleteRecord();
}
if(isset($_POST['deleteall'])){
    deleteAllRecords();
}


function insertData(){
    $courseName = textboxValue("course_name");
    $courseLecturer = textboxValue('author_name');
    $coursePrice = textboxValue('course_price');

    if($courseName && $courseLecturer && $coursePrice){
        $sql = "INSERT INTO subjects (course_name,author_name,course_price) VALUES('$courseName','$courseLecturer','$coursePrice')";
        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Record Successfully inserted...!");
        }else{
            echo "Error";
        }
    }else{
        TextNode("error","Provide Data in the TextBox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(!empty($textbox)){
        return $textbox ;
    }
    else
     return false ;
}

function TextNode($classname,$msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;

}

// get Data from the dataBase 

function getData(){
    $sql = "SELECT * FROM subjects";

    $result =  mysqli_query($GLOBALS['con'],$sql);
    
    if(mysqli_num_rows($result)>0){
      return $result ;
    }
}

// update data 

function updateData(){
 $courseid = textboxValue("course_id");
 $coursename = textboxValue("course_name");
 $courseLecturer = textboxValue("author_name");
 $courseprice = textboxValue("course_price");

 if($coursename && $courseLecturer && $courseprice){
    $sql = "
     UPDATE subjects SET course_name = '$coursename',author_name = '$courseLecturer',course_price = '$courseprice' WHERE ID = '$courseid';
    ";
    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("Success","Data Successfully Updated");
    }else{
        TextNode("error","Unable to Update Data ");
    }
 }else{
    TextNode("error","Select Data Using Edit Icon ");
 }
}


// delete a record 

function deleteRecord(){
   $courseid = (int)textboxValue("course_id");

   $sql = " DELETE FROM subjects WHERE ID = $courseid ";

   if(mysqli_query($GLOBALS['con'],$sql)){
    TextNode("Success","Record Deleted Successfully...!");
   }else{
    TextNode("error","Unable To Delete The Record");
   }

}


// delete Button 

function deleteBtn(){
    $result = getdata();
    $i = 0 ;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
          $i++;
          if($i>3){
            buttonElement("btn-deleteall","btn btn-danger","<i class ='fas fa-trash'></i> Delete All","deleteall","");
            return ;
          }
        }
    }
}

// delete All Records 


function deleteAllRecords(){
    $sql = "DROP TABLE subjects";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("Success","All Records Deleted Successfully....! ");
        Createdb();
    }else{
        TextNode("error","Unable To Delete The Records ");
    }
}

// setId 

function setID(){
    $getid = getdata();
    $id = 0 ;
    if($getid){
        while($row = mysqli_fetch_assoc($getid)){
            $id = $row['ID'];
        }
    }
    return ($id+1);
}