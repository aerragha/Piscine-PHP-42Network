#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $tab = [];
        if (($ret = fopen("php://stdin", "r")) != FALSE)
        {
            while (($data = fgetcsv($ret, 500, ";")) != FALSE)
                $tab[] = $data;  
            sort($tab);
            array_splice($tab, 0, 1);
            if ($argv[1] == "moyenne")
            {
                foreach ($tab as $elem)
                {
                    if ($elem[2] != "moulinette" && $elem[1] != "")
                    {
                        $sum = $elem[1] + $sum;
                        $i++;
                    }
                }
                echo $sum/$i."\n";
            }
            else if ($argv[1] == "moyenne_user")
            {
                $moy = [];
                foreach ($tab as $elem)
                {
                    $j = 0;
                    $moy_u = 0;
                    foreach ($tab as $ser)
                    {
                        if ($elem[0] == $ser[0] && $ser[2] != "moulinette" && $ser[1] != "")
                        {
                            $moy_u = $moy_u + $ser[1];
                            $j++;
                        }
                    }
                    $moy[$elem[0]] = $moy_u/$j;         
                }
                foreach ($moy as $login => $moyene)
                        echo "$login:$moyene\n";
            }
            else if ($argv[1] == "ecart_moulinette")
            {
                $moy = [];
                foreach ($tab as $elem)
                {
                    $j = 0;
                    $d = 0;
                    $moy_u = 0;
                    $moy_m = 0;
                    foreach ($tab as $ser)
                    {
                        if ($elem[0] == $ser[0] && $ser[2] != "moulinette" && $ser[1] != "")
                        {
                            $moy_u = $moy_u + $ser[1];
                            $j++;
                        }
                        if ($elem[0] == $ser[0] && $ser[1] != "" && $ser[2] == "moulinette")
                        {
                            $moy_m = $moy_m + $ser[1];
                            $d++;
                        }
                    }
                    $moy[$elem[0]] = (($moy_u/$j) - ($moy_m/$d));
                }
                foreach ($moy as $login => $moyene)
                        echo "$login:$moyene\n";
            }
        }

    }
?>