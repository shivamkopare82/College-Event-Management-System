<?php

if($count==1){
  session_start();
  $_SESSION['logged']=true;
  $_SESSION ['name']=$name;
  header("refresh:1;url=index.php");
  }
else{
   $_SESSION['logged']=false;
   header("refresh:2;url=login_form.php");}

   ?>