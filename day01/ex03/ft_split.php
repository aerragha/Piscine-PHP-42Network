<?php
    function ft_split($str)
    {
        $tab = explode(" ", $str); 
        $tab = array_filter($tab, function ($val) {
            return (trim($val) != "");
        });
        sort($tab, SORT_STRING);
        return ($tab);
    }
?>
