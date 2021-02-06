#!/usr/bin/php
<?php
    function epur_str($string)
    {
        $str = trim($string, " ");
        while (strstr($str, "  "))
            $str = str_replace("  ", " ", $str);
        return ($str);
    }
    function ft_split($str)
    {
        $str = epur_str($str);
        $tab = explode(" ", $str);
        $tab = array_filter($tab, function ($val) {
            return (trim($val) != "");
        });
        sort($tab, SORT_STRING);
        return ($tab);
    }
    if ($argc > 1)
    {
        $str = array();
        foreach ($argv as $elem)
        {
            if ($elem != $argv[0])
            {
                $tab = ft_split($elem);
                $str = array_merge($str, $tab);
            }
        }
        sort($str, SORT_STRING);
        foreach($str as $elem)
                echo $elem."\n";
    }
?>