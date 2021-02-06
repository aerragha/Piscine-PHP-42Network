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
    if ($argc == 4)
        echo do_op(trim($argv[1]), trim($argv[3]), trim($argv[2]))."\n";
    else
        echo "Incorrect Parameters\n";
?>