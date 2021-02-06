<?php
    date_default_timezone_set('Africa/Casablanca');
    if (file_exists("../private/chat") == TRUE)
    {
        $tab = unserialize(file_get_contents("../private/chat"));
        foreach ($tab as $elem)
            echo "[".date("H:i", $elem['time'])."] <b>".$elem['login']."<b>: ".$elem['msg']."<br />\n";
    }
?>