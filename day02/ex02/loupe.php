#!/usr/bin/php
<?php
    function ft_attupper($str)
    {
        $t = strstr($str, ">", 1);
        $t = strtoupper($t);
        $t = $t . strstr($str, ">");
        return ($t);
    }

    function ft_strupper($str)
    {
        $t = strstr($str, ">");
        $t = strtoupper($t);
        $t = strstr($str, ">", 1) . $t;
        return ($t);
    }

    if ($argc == 2)
    {
        $file = file_get_contents($argv[1]);
        $tab = explode('title', $file);
        while ($j < count($tab))
        {
            if (preg_match("/\s{0,}=/", $tab[$j]) != 0)
                $tab[$j] = ft_attupper($tab[$j]);
            $j++;
        }
        $ch = implode('title', $tab);
        $tab = explode('<', $ch);
        $j = 0;
        while ($j < count($tab))
        {
            if (strstr($tab[$j], "href") == TRUE || strstr($tab[$j], "span") == TRUE || strstr($tab[$j], "div") == TRUE)
                $tab[$j] = ft_strupper($tab[$j]);
            $j++;
        }
        $ch = implode('<', $tab);
        echo $ch;
    }
?>