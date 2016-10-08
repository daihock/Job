<?php
/**
 * Created by PhpStorm.
 * User: daihock
 * Date: 07.10.2016
 * Time: 21:26
 */
error_reporting(0);
require_once 'Request.class.php';
require_once 'CheckFile.class.php';

if (isset($_REQUEST['request'])) {
    $requestValue = $_REQUEST['request'];
    $req = new Request();
    $file = $req->getFile($requestValue);
    $check = new CheckFile();
    $view = $check->getView($file);

} else {
    $requestValue = "http://";
    $view = '';
}

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="robo.css">
    <title>Robots Test</title>
</head>
<body>
<div class="request">
    <form action="robotstest.php" method="get" >
        <label>Web address:
            <input type="text" name="request" value="<?= $requestValue ?>">
        </label>
        <p style="font-size: small;margin: 1px;font-style: italic;">Пример: http://example.com</p>
        <button type="submit">Запрос robots.txt</button>


    </form>
</div>

<?= $view ?>

</body>
</html>
