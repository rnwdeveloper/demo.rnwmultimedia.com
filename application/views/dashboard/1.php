array

1. indexed array

2. associative array

3. multidimesional array


indexed array
<?php

$name =  array("piyush","haresh","rohan","vivek","manish");

echo sizeof($name);


for($i=0 ; $i<sizeof($name) ; $i++)
{
	echo $name[$i]."<br>";
	// echo "<br>";
}

echo $name[0];
echo "<br>";
echo $name[1];

echo $name[2];


print_r($name);
output: 
array("0"=>"piyush","1"=>"haresh","2"=>"rohan");

?>