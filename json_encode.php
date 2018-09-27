<?php  
//PDO is a extension which  defines a lightweight, consistent interface for accessing databases in PHP.  
$db=new PDO('mysql:dbname=appsdreamers_admin;host=localhost;','root','');  

//here set the utf8 
$db->query("SET NAMES 'utf8'");

//set the PDO error mode to exception
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//here prepare the query for analyzing, prepared statements use less resources and thus run faster 
$row=$db->prepare('select * from questions');  
  
$row->execute();//execute the query  

$json_data=array();//create the array  

foreach($row as $rec)//foreach loop  
{  
    $json_array['id']=$rec['id'];  
    $json_array['level']=$rec['level'];  
    $json_array['difficulty']=$rec['difficulty'];  
    $json_array['is_shown']=$rec['is_shown'];  
	$json_array['question']=$rec['question'];  
    $json_array['option_a']=$rec['option_a'];  
    $json_array['option_b']=$rec['option_b'];  
    $json_array['option_c']=$rec['option_c'];  
    $json_array['option_d']=$rec['option_d'];  
    $json_array['right_ans']=$rec['right_ans'];
	
//here pushing the values in to an array  
    array_push($json_data,$json_array);  
  
}  
  
//built in PHP function to encode the data in to JSON format  
echo json_encode($json_data,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRESERVE_ZERO_FRACTION | JSON_FORCE_OBJECT);  
?>  