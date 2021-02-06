#!/usr/bin/php
<?php
    function do_op($nb1, $nb2, $op)
    {
        if ($op == '+') return ($nb1 + $nb2);
        if ($op == '-') return ($nb1 - $nb2);
        if ($op == '*') return ($nb1 * $nb2);
        if ($op == '/') return ($nb1 / $nb2);
        if ($op == '%') return ($nb1 % $nb2);
        return (0);
    }

    if ($argc == 2)
    {
        $tab = sscanf($argv[1], "%d %c %d %s");
        if ($tab[0] && $tab[1] && $tab[2] && !$tab[3])
            echo do_op($tab[0], $tab[2], $tab[1])."\n";
        else
            echo "Syntax Error\n";
    }
    else
        echo "Incorrect Parameters\n";
?>