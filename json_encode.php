<?php  
try {
$link=mysqli_connect("localhost","root","","utf_insertion"); //db host, admin, password, db name
mysqli_set_charset($link,"utf8");
$sql="SELECT * from insertion"; //table name
$result=mysqli_query($link,$sql);

$json_data=array();//create the array 

while($row = mysqli_fetch_assoc($result))  
           {  
                $json_data['questions'][] = $row;  //JSON array name
           }  
 echo json_encode($json_data, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK); // echo the id in int via JSON_NUMERIC_CHECK and converts utf8 into text via JSON_UNESCAPED_UNICODE

}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}  
?>  
