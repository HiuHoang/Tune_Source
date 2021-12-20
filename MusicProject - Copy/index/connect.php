<?php
 $servername = 'localhost';
 $username ='root';
 $password='';
 $database = 'musicwebsite';
  //Khai báo biến để kết nối đến CSDL
 $connect = mysqli_connect($servername, $username,$password,$database);
 if(!$connect){
  echo"Fail";
 }
 else{
  echo"";
 }
 ?>