<?php
require_once "includes01/Person.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        $person01 = new Person("John", "Blue", 28);
        echo $person01 -> getName();

    ?>
</body>
</html>