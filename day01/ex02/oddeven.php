#!/usr/bin/php
<?php
    while (1)
    {
        echo "Enter a number: ";
        $inpt2 = trim(fgets(STDIN), "\n");
        $inpt = trim($inpt2);
        if (feof(STDIN) == true)
            exit("\n");
        if (!is_numeric($inpt))
            echo "'".$inpt2."' is not a number\n";
        else
        {
            echo "The number ".$inpt." is";
            if ($inpt % 2 == 0)
                echo " even\n";
            else
                echo " odd\n";
        }
    }
?>