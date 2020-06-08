<?php
include_once "db.php";
include_once "informations.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$object2 = new reader();
echo $object2->getCount(1, 'test_1');
?> 
</body>
</html>