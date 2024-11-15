<?php


    include('../include/connect.php');
    if(!empty($_POST["submit1"]) || isset($_POST["submit1"])){
     if (isset($_FILES["img1"])) {
            $filename1= $_FILES["img1"]["name"];
        }
      if (isset($_FILES['img2'])) {
            $filename2= $_FILES["img2"]["name"];
        }
    }else{
        echo "kjghhjg";
    }













?>