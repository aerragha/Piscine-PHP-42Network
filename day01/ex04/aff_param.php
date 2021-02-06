#!/usr/bin/php
<?php
    foreach ($argv as $elem)
    {
        if ($argv[0] != $elem)
            echo $elem."\n";
    }
?>