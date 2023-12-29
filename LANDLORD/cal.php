<?php
if(isset($_GET['operation'])){
    $x=$_GET['num1'];
}
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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="get">
     
     <div>
        <label for="num1">first number</label>
        <input type="number" id="num1" name="num1">
     </div>
     
     <div>
        <label for="num2">second number</label>
        <input type="number" id="num2" name="num2">
     </div>
     
     <div>
        <label for="result">result</label>
        <input type="number" id="result" disabled>
     </div>
     
     <div>
        <input type="submit" name="operation" value='add'>
        <input type="submit" name="operation" value='sub'>
        <input type="submit" name="operation" value='mul'>
        <input type="submit" name="operation" value='div'>
     </div>
</form>
</body>
</html>