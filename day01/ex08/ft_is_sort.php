<?php
    function ft_is_sort($tab)
    {
        $tab2 = $tab;
        sort($tab);
        $i = 0;
        while ($i < count($tab))
        {
            if ($tab[$i] != $tab2[$i])
                return (FALSE);
            $i++;
        }
        return (TRUE);
    }
?>
