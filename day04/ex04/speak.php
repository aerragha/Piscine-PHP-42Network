<?php
    session_start();
    if ($_SESSION['loggued_on_user'] != "")
    {
        if ($_POST['submit'] == "OK")
        {
            if (file_exists('../private/chat') == FALSE)
            {
                $tab = array(array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']));
                $seri = serialize($tab);
                file_put_contents('../private/chat', $seri);
            }
            else
            {
                $fd = fopen('../private/chat', 'c+');
                flock($fd, LOCK_SH | LOCK_EX);
                $tmp = file_get_contents('../private/chat');
                $tab = unserialize($tmp);
                $tab[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
                $seri = serialize($tab);
                file_put_contents('../private/chat', $seri);
                flock($fd, LOCK_UN);
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
        </head>
        <body>
            <form method="POST" action="">
                <input type="text" name="msg" value="" required /><br>
                <input type="submit" name="submit" value="OK">
            </form>
        </body>
        </html>
    <?php        
    }
    else
        echo "ERROR\n";
?>