<?php /* Template Name: Sous-Page */

if ($_POST['submit']) {

    $to = 'wollsale@gmail.com';
    $subject = 'The subject';
    $body = 'The email body content';
    $attachment = $_FILES['userfile']['tmp_name'];
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers, $attachment);

    var_dump($attachment);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden"> Send this file: <input name="userfile" type="file">
        <input type="submit" name="submit" value="Send File">
    </form>
</body>

</html>