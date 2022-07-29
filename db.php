<?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'root';
    $db_name = "our_blog";
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }




    $host = "";

class database
{
    private $servername = "localhost";
    private $username = "root";
    private $pass = "root";
    private $databasename = "our_blog";
    private $mysqli = "";


    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->pass, $this->databasename);
    }

    public function insertdata($insert_query)
    {
        if ($this->mysqli->query($insert_query) === true) {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function fetchdata($fetch_query)
    {
        return $this->mysqli->query($fetch_query);
    }


    public function update_data($update_query)
    {
        if ($this->mysqli->query($update_query) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_data($delete_query)
    {
        if ($this->mysqli->query($delete_query) === true) {
            return true;
        } else {
            return false;
        }
    }
}

?>  