<?php


$conn = mysqli_connect("localhost", "root", "amer123456", "country information");


$result = mysqli_query($conn,"SELECT Year, Amount_in_dollar FROM gdb Where Country='China'");

$data =array();

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);


?>