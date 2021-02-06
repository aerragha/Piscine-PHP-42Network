#!/usr/bin/php
<?php
    function epur_str($string)
    {
        $str = trim($string, " ");
        while (strstr($str, "  "))
            $str = str_replace("  ", " ", $str);
        return ($str);
    }

    if ($argc > 1)
    {
        $argv[1] = epur_str($argv[1]);
        $tab = split(" ", $argv[1]);
        foreach ($tab as $elem)
        {
            if ($elem != $tab[0])
                echo $elem." ";
        }
        echo $tab[0]."\n";
    }
?>