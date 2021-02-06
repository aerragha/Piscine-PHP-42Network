#!/usr/bin/php
<?php
    $res = NULL;
    foreach ($argv as $elem)
    {
        if ($elem != $argv[0] && $elem != $argv[1])
        {
            $tab = explode(":", trim($elem));
            if ($argv[1] == $tab[0])
                $res = $tab[1];
        }
    }
    if ($res != NULL)
        echo $res."\n";
?>