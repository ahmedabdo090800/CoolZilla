<?php


//function to get produects

function getproducts(){
    
    global $con;                                  
    $select_query="select * from product order by rand() " ;  //limit 0,9
    $result_query=mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $id_product=$row['id'];
        $name = $row['name'];
        $brand = $row['brand'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $words = str_word_count($description, 1);

        // Select the first 10 words
        $firstTenWords = array_slice($words, 0, 8);
        
        // Convert the selected words back to a string
        $selectedText = implode(' ', $firstTenWords);        
        $product_image1 =$row['product_image1'];
        $product_image2 =$row['product_image2'];
        $product_image3 =$row['product_image3'];

        echo"
        
        
        <div class='card  col-md-3'>
        <div class='card-icon'>
            <i class='iii fa-solid fa-heart'></i>
            <i class=' iii fa-solid fa-share'></i>
        </div>
        <div class='card-image'>
        <img src='admin/product/product_images/$product_image1' alt=''>
        </div>
        <div class='card-body'>
            <h5>$name</h5>
            <p>$selectedText</p>
            <h3>$$price</h3>
                    <a class='btn btn-card1' href='index.php?add_to_cart=$id_product'>Add To Card</a>
            <a href='product_details.php?id_product=$id_product'  class='btn btn-card2' href=''>View Details</a>

        </div>
    </div>


        
        
        ";

    }   
}

//function to Search


function searchproduct(){
    
    global $con;   
    if(isset($_GET['search_data_product'])){
        
        $search_data=$_GET['search_data'];
        
                                 
    $select_query="select * from product where name like '%$search_data%' " ;  //limit 0,9

    $result_query=mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
echo "<h2 class='text-center mt-5 mb-5 text-danger'>SORRY ! No results match</h2>";
}
    while($row=mysqli_fetch_assoc($result_query)){
        $id_product=$row['id'];
        $name = $row['name'];
        $brand = $row['brand'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];

        echo"

        <div class='card  col-md-3'>
        <div class='card-icon'>
            <i class='iii fa-solid fa-heart'></i>
            <i class=' iii fa-solid fa-share'></i>
        </div>
        <div class='card-image'>
            <img src='img/Air-Conditioning-Not-Cooling-Properly-1024x649' alt=''>
        </div>
        <div class='card-body'>
            <h5>$name</h5>
            <p>$description</p>
            <h3>$$price</h3>
            <a class='btn btn-card1' href='index.php?add_to_cart=$id_product'>Add To Card</a>
            <a href='product_details.php?id_product=$id_product'  class='btn btn-card2' href=''>View Details</a>        </div>
    </div>
        
        
        ";

    }   
}
}




function product_details(){
    
    global $con; 
    if(isset($_GET['id_product'])){                   
     $id_product=   $_GET['id_product'] ;          
    $select_query="select * from product where id=$id_product" ;  //limit 0,9
    $result_query=mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $id_product=$row['id'];
        $name = $row['name'];
        $brand = $row['brand'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $product_image1 =$row['product_image1'];
        $product_image2 =$row['product_image2'];
        $product_image3 =$row['product_image3'];

        echo"
        
        
        <div class='col-md-7'>
        <div class='card' style='height: 600px; background: #fff;'>
        <div class='card-image'>
        <img src='admin/product/product_images/$product_image1' alt=''>
        <img src='admin/product/product_images/$product_image2' alt=''>
        <img src='admin/product/product_images/$product_image3' alt=''>
        </div>
            <div class='card-body-details'>
    <h5>$name</h5>
    <p>$description</p>
    <h3>$price</h3>
            <a class='btn btn-card1' href='index.php?add_to_cart=$id_product'>Add To Card</a>

</div>
                <h6>SHARE THIS PRODUCT   </h6>
                <div class=''>
                    <a href=''><i class='fa-brands fa-facebook-f'></i></a>
                    <a href=''><i class='fa-brands fa-twitter'></i></a>
                    <a href=''><i class='fa-brands fa-instagram'></i></a>

                </div>
            </div>
        </div>
    </div>
    <div class='col-md-3'>
        <h1>djsk dsnbcds v dksvbdshk</h1>


</div>


        
        
        ";
    }
    }   

}











// function get_ip() {
//     $ip = '';
//     if (isset($_SERVER['HTTP_CLIENT_IP'])){
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
//         $ip = $_SERVER['HTTP_X_FORWARDED'];
//     }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
//         $ip = $_SERVER['HTTP_FORWARDED_FOR'];
//     }else if(isset($_SERVER['HTTP_FORWARDED'])){
//         $ip = $_SERVER['HTTP_FORWARDED'];
//     }else if(isset($_SERVER['REMOTE_ADDR'])){
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     if( empty($ip) || $ip == '0.0.0.0' || substr( $ip, 0, 2 ) == '::' ){
//         $ip = file_get_contents('https://api.ipify.org/');
//         $ip = ($ip===false?$ip:'');
//     }
//     return $ip;
// }
// // if (!empty($_SERVER['HTTP_CLIENT_IP']))   
//   {
//     $ip_address = $_SERVER['HTTP_CLIENT_IP'];
//   }
// //whether ip is from proxy
// elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
//   {
//     $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
//   }
// //whether ip is from remote address
// else
//   {
//     $ip_address = $_SERVER['REMOTE_ADDR'];
//   }
// echo $ip_address;

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


function cart(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add =getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from cart_details  where ip_address='$get_ip_add' and
    product_id=$get_product_id";

    $result_query=mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
    

    echo "<script> alert('This item is already present inside cart') </script>";
    echo "<script> window.open('index.php','_self') </script>";


    }else{
        

$insert_query="insert into cart_details (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_add', 0)"; 
$result_query=mysqli_query($con, $insert_query);
echo "<script> alert('item is added to cart') </script>";
echo "<script> window.open('index.php','_self') </script>";
    }
}
}

// count the number of items 
function cart_item(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add =getIPAddress();
    $select_query="Select * from cart_details  where ip_address='$get_ip_add'";

    $result_query=mysqli_query($con, $select_query);
    $num_of_items=mysqli_num_rows($result_query);
    }else{
    global $con;
    $get_ip_add =getIPAddress();
    $select_query="Select * from cart_details  where ip_address='$get_ip_add'";

    $result_query=mysqli_query($con, $select_query);
    $num_of_items=mysqli_num_rows($result_query);
    }
    
echo   $num_of_items;
}


Function total_card_price (){
    global $con;
    $get_ip_add =getIPAddress();
    $total_price=0;

    $cart_query="Select * from cart_details where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);

    while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from product where id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
    $product_price=array($row_product_price['price']); 
    $product_values= array_sum($product_price); // [500]
    $total_price+=$product_values; //500
    }
    }
    
    echo $total_price;
    
    }





function get_user_order_details(){
global $con;
$username=$_SESSION['username'];
$get_details="Select * from `user_table` where username='$username'"; 
$result_query=mysqli_query($con, $get_details);
while($row_query=mysqli_fetch_array($result_query)){
$user_id=$row_query['user_id'];
$get_orders="Select * from user_orders where user_id=$user_id and order_status='pending'";
$result_order_query=mysqli_query($con, $get_orders);
$row_count=mysqli_num_rows($result_order_query);
if($row_count>0){
echo "<h3 class='text-center'>You have <span style='font-size:100px'class='btn fs-1  text-danger'>$row_count</span> pending orders</h3>
<a href='profile_order.php' style=''>Order Details</a> 


";
}
}
}

//setting function

?>
