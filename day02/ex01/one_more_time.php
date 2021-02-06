#!/usr/bin/php
<?php
    function check_arg($str)
    {
        if ((preg_match("/^([L|l]undi|[M|m]ardi|[M|m]ercredi|[J|j]eudi|[V|v]endredi|[S|s]amedi|[D|d]imanche) ([0-9]{1,2}) ([J|j]anvier|[F|f]évrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d]écembre) [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $str)) != 0)
            return (TRUE);
        else
            return (FALSE);
    }
    
    function get_mois($str)
    {
        if ($str == "janvier" || $str == "Janvier")
            return (1);
        if ($str == "fevrier" || $str == "Fevrier" || $str == "Février" || $str == "février")
            return (2);
        if ($str == "mars" || $str == "Mars")
            return (3);
        if ($str == "avril" || $str == "Avril")
            return (4);
        if ($str == "mai" || $str == "Mai")
            return (5);
        if ($str == "Juin" || $str == "juin")
            return (6);
        if ($str == "juillet" || $str == "Juillet")
            return (7);
        if ($str == "Aout" || $str == "aout" || $str == "Août" || $str == "août")
            return (8);
        if ($str == "septembre" || $str == "Septembre")
            return (9);
        if ($str == "octobre" || $str == "Octobre")
            return (10);
        if ($str == "novembre" || $str == "Novembre")
            return (11);
        if ($str == "decembre" || $str == "Décembre" || $str == "Decembre" || "décembre")
            return (12);
    }
    
    date_default_timezone_set("Europe/Paris"); // pour la fonction mktime(warning)
    //date_default_timezone_set("Africa/Casablanca");
    if ($argc > 1)
    {
        $argv[1] = str_replace("é", "e", $argv[1]);
        $argv[1] = str_replace("û", "u", $argv[1]);
        if (check_arg($argv[1]) == TRUE)
        {
            preg_match("/([0-9]{1,2})/", $argv[1], $num_jour);
            preg_match("/([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre)/", $argv[1], $mois);
            $mois_num = get_mois($mois[0]);
            preg_match("/[0-9]{4}/", $argv[1], $annee);
            preg_match("/[0-9]{2}:/", $argv[1], $heure);
            $heure[0] = substr($heure[0], 0, 2);
            preg_match("/:[0-9]{2}:/", $argv[1], $min);
            if (checkdate($mois_num, $num_jour[0], $annee[0]))
            {
                $min[0] = substr($min[0], 1);
                $min[0] = substr($min[0], 0, 2);
                preg_match("/:[0-9]{2}$/", $argv[1], $sec);
                $sec[0] = substr($sec[0], 1);
                if ($heure[0] >= 24 || $min[0] >= 60 || $sec[0] >= 60)
                    echo "Wrong Format\n";
                else
                    echo mktime($heure[0], $min[0], $sec[0], $mois_num, $num_jour[0], $annee[0])."\n"; // calcule nbr secondes from Unix timestamp was begin from 1/1/1970
            }
            else
                echo "Wrong Format\n";
        }
        else
            echo "Wrong Format\n";
    }
?>