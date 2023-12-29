<?php

// $error="";
// if (isset($_GET['operation'])) {
//     $x = $_GET['num1'];
//     $y = $_GET['num2'];
//     $op = $_GET['operation'];

//     if (is_numeric($x) && is_numeric($y)) {
//         switch ($op) {
//             case 'add':
//                 $result = $x + $y;
//                 break;
//             case 'sub':
//                 $result = $x - $y;
//                 break;
//             case 'mul':
//                 $result = $x * $y;
//                 break;
//             case 'div':
//                 $result = $x / $y;
//                 break;
//         }
//     }else{
//         $error = "Please Enter number";
//     }
// }
$error = '';
if (isset($_GET['operation'])) {
    $x = $_GET['num1'];
    $y = $_GET['num2'];
    $op = $_GET['operation'];
    if (is_numeric($x) && is_numeric($y)) {
        if ($op == 'add') {
            $result = $x + $y;
        } elseif ($op == 'sub') {
            $result = $x - $y;
        } elseif ($op == 'mul') {
            $result = $x * $y;
        } elseif ($op == 'div') {
            $result = $x / $y;
        }
    } else {
        $error = "Please Enter number";
    }
}

for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < $i; $j++) {
        echo "$i";
    }
    echo "<br>";
}

$z = 1;
while ($z < 7) {
    for ($k = 1; $k < $z; $k++) {
        $u= $k+$z;
        echo $k.'+'.$z.'='. $u;
        echo "<br>";
    }
    echo "<br>";
    $z++;
}

$age =array('david','dominick','daniel');
$number = count($age);
for($i=0; $i<$number; $i++){
    echo $age[$i];
}


function friends($fname,$lname){
    $fullname= $fname. $lname;
    return $fullname;
}
echo friends('dominick','kyengo');
friends('daniel','ndirangu');
friends('eddah','chepkoech');
echo "<br>";
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );

  for($rows=0;$rows<4;$rows++){
   echo "row number .$rows.<br>"; 
   echo "<ul>";
   for($col=0; $col<3;$col++){
    echo $cars[$rows][$col];
   }
   echo "</ul>";
  }

class car{
    function type(){
        $typename="nissan";
        echo $typename;
    }
}
$obj= new car();
$obj->type();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $error ?></h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">

        <!-- first number -->
        <div>
            <label for="num1">first number</label>
            <input type="number" id="num1" name="num1" value="<?php echo $x ?>">
        </div>

        <!-- second number -->
        <div>
            <label for="num2">second number</label>
            <input type="number" id="num2" name="num2" value="<?php echo $y ?>">
        </div>

        <!-- result -->
        <div>
            <label for="result">first number</label>
            <input type="number" id="result" value="<?php echo $result ?>" disabled>
        </div>

        <!-- operation -->
        <input type="submit" name="operation" value="add">
        <input type="submit" name="operation" value="sub">
        <input type="submit" name="operation" value="mul">
        <input type="submit" name="operation" value="div">
    </form>
</body>

</html>