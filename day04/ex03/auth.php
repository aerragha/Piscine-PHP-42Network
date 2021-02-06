<?php
    function auth($login, $passwd)
    {
        $bool = FALSE;
        $passwd = hash('whirlpool', $passwd);
        $tmp = file_get_contents("../private/passwd");
        $tab = unserialize($tmp);
        foreach ($tab as $elem)
        {
            if ($elem['login'] == $login && $passwd == $elem['passwd'])
                $bool = TRUE;
        }
        return ($bool);
    }
?>