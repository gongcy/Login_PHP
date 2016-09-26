<?php

class opmysql
{
    private $host = 'localhost';    // server address
    private $user = 'root';         // Database user
    private $pwd = '';              // Database password
    private $dbName = 'db_reglog';  // Database Name
    private $conn = '';             // Database connection resource
    private $result = '';           // result set
    private $msg = '';              // return result
    private $fields;                // return fields
    private $fieldsNum = 0;         // return fields' number
    private $rowsNum = 0;           // return results' number
    private $rowsRst = '';          // return single records' field array
    private $filesArray = array();  // return field array
    private $rowsArray = array();   // return result array

    function __construct($host = '', $user = '', $pwd = '', $dbName = '')
    {
        if ($host != '') {
            $this->host = $host;
        }
        if ($user != '') {
            $this->user = $user;
        }
        if ($pwd != '') {
            $this->pwd = $pwd;
        }
        if ($dbName != '') {
            $this->dbName = $dbName;
        }
        $this->init_conn();
    }

    // Database connection
    function init_conn()
    {
        $this->conn = @mysqli_connect($this->host, $this->user, $this->pwd);
        @mysqli_select_db($this->dbName, $this->conn);
        mysqli_query("set names utf-8");
    }

    // find result
    function mysql_query_rst($sql)
    {
        if ($this->conn == '') {
            $this->init_conn();
        }
        $this->result = @mysqli_query($sql, $this->conn);
    }

    //
    function getRowsNum($sql)
    {
        $this->mysql_query_rst($sql);
        if (mysqli_errno() == 0) {
            return @mysql_num_rows($this->result);
        } else {
            return '';
        }
    }

    //
    function getRowsRst($sql)
    {
        $this->mysql_query_rst($sql);
        if (mysqli_errno() == 0) {
            $this->rowsRst = mysqli_fetch_array($this->result, MYSQLI_ASSOC);
            return $this->rowsRst;
        } else {
            return '';
        }
    }

    // get record array
    function getRowsArray($sql)
    {
        $this->mysql_query_rst($sql);
        if (mysqli_errno() == 0) {
            while ($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) {
                $this->rowsArray[] = $row;
            }
        } else {
            return '';
        }
    }

    //
    function uidRst($sql)
    {
        if ($this->conn == '') {
            $this->init_conn();
        }
        @mysqli_query($sql);
        $this->rowsNum = @mysqli_affected_rows();
        if (mysqli_errno() == 0) {
            return $this->rowsNum;
        } else {
            return '';
        }
    }

    // release result set
    function close_rst()
    {
        mysqli_free_result($this->result);
        $this->msg = '';
        $this->fieldsNum = 0;
        $this->rowsNum = 0;
        $this->filesArray = '';
        $this->rowsArray = '';
    }

    // close database
    function close_conn()
    {
        $this->close_rst();
        mysqli_close($this->conn);
        $this->conn = '';
    }
}

$conne = new opmysql();
?>