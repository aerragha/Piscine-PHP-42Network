#!/usr/bin/php
<?php
    function getimg($url) 
    {                         
        $process = curl_init($url);                                      
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
        $return = curl_exec($process);         
        curl_close($process);         
        return $return;
    } 

    if ($argc > 1)
    {
        $c = curl_init($argv[1]);
        $str = file_get_contents($argv[1]);
        preg_match_all('/<img.{0,}src=["\/|h][[:graph:]]+/', $str, $match);    
        $j = 0;
        while ($j < count($match[0]))
        {
            $val = substr(strstr($match[0][$j], "src="), 5);
            $val = str_replace('"', '', $val);
            $val = str_replace('>', '', $val);
            if ($val[0][0] == "/")
                $match[0][$j] = $argv[1] . $val;
            else
                $match[0][$j] = $val;
            $j++;
        }
        $val = $argv[1];
        if (substr($argv[1], 0, 7) == "http://")
            $val = substr($argv[1], 7);
        if (file_exists($val) == FALSE)
            mkdir($val);
        foreach ($match[0] as $elem)
        {
            $name = basename($elem);
            if (file_exists("./$val/".$name) == FALSE)
                $img = getimg($elem);
            file_put_contents($val.'/'.$name,$img);
        }
    }
?>