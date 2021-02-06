<?php
    if ($_POST['login'] == "" || $_POST['passwd'] == "" || $_POST['submit'] != "OK")
        echo "ERROR\n";
    else
    {
        $passwd = hash('whirlpool', $_POST['passwd']);
        if (file_exists('../private') == FALSE)
            mkdir('../private');
        if (file_exists('../private/passwd') == FALSE)
        {
            $tab = array(array('login' =>$_POST['login'], 'passwd'=>$passwd));
            $seri = serialize($tab);
            file_put_contents('../private/passwd', $seri);
            header("Location: index.html");
            echo "OK\n";
        }
        else
        {
            $bool = FALSE;
            $tmp = file_get_contents('../private/passwd');
            $tab = unserialize($tmp);
            foreach ($tab as $elem)
            {
                if ($elem['login'] == $_POST['login'])
                    $bool = TRUE;
            }
            if ($bool == TRUE)
                echo "ERROR\n";
            else
            {
                $tab[] = array('login' =>$_POST['login'], 'passwd'=>$passwd);
                $seri = serialize($tab);
                file_put_contents('../private/passwd', $seri);
                header("Location: index.html");
                echo "OK\n";
            }
        }
    }
?>