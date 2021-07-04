<?php


$conn = mysqli_connect("localhost", "root", "amer123456", "country information");


$result = mysqli_query($conn,"SELECT Year, Count_of_death FROM death_from_air_pollution Where Country='United States'");

$data =array();

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);


?>