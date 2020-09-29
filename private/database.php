<!-- APIs are needed to connect PHP & database. Ex:mysql,mysqli,pdo -->
<!-- hacker can manipulate sql -> sql injection.
It affects dynamic values in query. Ex:id value
Solution to prevent sql injection:
1.sanitise data -> add \ before ',",\(if any in query) etc.
we use addslashes($string) & mysqli_real_escape_string($db,$string)
2.delimiting data values -> use ' for all values even for numbers & booleans -->

<?php
    require_once('db_credentials.php');

    function db_connect()
    {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME, '3308');
        confirm_db_connection();
        return $connection;
    }

    function db_disconnect($connection)
    {
        if(isset($connection))
        {
            mysqli_close($connection);
        }
    }

    function confirm_db_connection()
    {
        if(mysqli_connect_errno())
        {
            $msg="db connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .="(".mysqli_connect_errno().")";
            exit($msg);
        }
    }

    function confirm_result_set($result_set)
    {
        if(!$result_set)
        {
            exit("DB query failed");
        }
    }

    function db_escape($connection,$string)
    {
        return mysqli_real_escape_string($connection, $string);
    }    
?>