<?php
    declare(strict_types = 1);
    include 'class-autoload.inc.php';

    if(isset($_POST['submit'])){
        $oper = $_POST["oper"];
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
    }else{
        echo "Error occured!";
    }

    $calc = new Calc($oper, (int)$num1, (int)$num2);

    try {
        echo $calc -> calculator();
    }catch(TypeError $e) {
        echo "Error!: ". $e -> getMessage();
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
    <a href="../index.php">Home</a>
</body>
</html>