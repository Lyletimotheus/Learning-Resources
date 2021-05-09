<?php include_once 'includes03/autoloader.inc.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $person1 = new Person\Person("John", 34); //Making reference to the namespace Person
        echo $person1 -> getPerson();
    ?>
</body>
</html>