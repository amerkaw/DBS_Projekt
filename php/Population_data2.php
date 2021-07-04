<?php


$conn = mysqli_connect("localhost", "root", "amer123456", "country information");


$result = mysqli_query($conn,"SELECT Year, Count FROM population_total Where Country='India'");

$data =array();

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);


?>