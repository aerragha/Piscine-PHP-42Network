<?php
    if ($_POST["submit"] == "OK")
    {
        if ($_POST["newpw"] == "" || $_POST["oldpw"] == "")
            echo "ERROR\n";
        else
        {
            $bool = FALSE;
            $newpass = hash('whirlpool', $_POST['newpw']);
            $oldpass = hash('whirlpool', $_POST['oldpw']);
            $tmp = file_get_contents("../private/passwd");
            $tab = unserialize($tmp);
            $i = 0;
            foreach ($tab as $elem)
            {
                if ($elem['login'] == $_POST['login'] && $elem["passwd"] == $oldpass && $elem["passwd"] != $newpass)
                {
                    $tab[$i]['passwd'] = $newpass;
                    $bool = TRUE;                   
                }
                $i++;
            }
            if ($bool == TRUE)
            {
                $seri = serialize($tab);
                file_put_contents("../private/passwd", $seri);
                echo "OK\n";
            }
            else
                echo "ERROR\n";
        }
    }
?>