<?php
 define("HOST","localhost");
define("USER","root");
define("DB","shoppie");
define("PASS","");
session_start();
$connect=mysqli_connect(HOST,USER,PASS,DB) or die("db connection fail");
function insertData($table,$array){
    global $connect;
    $colums=implode(",",array_keys($array));
    $values=implode("','",array_values($array));
    $query=mysqli_query($connect, "insert into $table ($colums) value ('$values')");
   return $query;
}
function calling($table){
    global $connect;
    $array= [];
    $query =mysqli_query($connect, "select * from $table");
    while ($row=mysqli_fetch_array($query)){
        $array[]=$row;

    }
    return $array;
    
}
function callingOne($table){
    $data=calling($table);
    return $data[0];
}
function delete($table, $where ){
    global $connect;
    $query = mysqli_query($connect, "delete from $table where $where");
    return true;
}

function redirect($page){
    echo "<script>window.open('$page','_self')</script>";
}
?>