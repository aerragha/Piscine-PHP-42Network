<?php
    $user = $_SERVER["PHP_AUTH_USER"];
    $password = $_SERVER["PHP_AUTH_PW"];
    if ($user == "zaz" && $password == "jaimelespetitsponeys")
    {
        $img = file_get_contents("../img/42.png");
        echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,".base64_encode($img)."'>\n</body></html>\n";
    }
    else
    {
        header("WWW-Authenticate: Basic realm=''Espace membres''");
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: text/html');
        header('Connection: close');
        echo "<html><body>That area is accessible for members only</body></html>\n";
    }
?>