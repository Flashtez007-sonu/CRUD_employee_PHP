<?php 


// $servername="localhost";
// $username="root";
// $password="";
// $db="company2";

// $conn = new mysqli($servername,$username,$password,$db);

// if($conn->connect_error)
// {
//     die("their is an error in connection of db ".$conn->connect_error);
// }


// Create connection
// $conn = mysqli_connect($servername, $username, $password,$db);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }


class Database 
{

    // database information
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $db="employee_management";

    // helper properties
    private $connection;
    private $successAdd = " Your Record Have Been Added";
    private $updatedSuccess = " Your Record Have Been Updated";
    private $deletedSuccess = " Your Record Have Been Deleted";


    public function __construct()
    {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password,$this->db);
        if(!$this->connection)
        {
            die("their is an error in connection of db ". mysqli_connect_error());
        }
    }



    //  insert new record 

    public function addemployee($sql)
    {
        if(mysqli_query($this->connection,$sql))
        {
            return $this->successAdd;
        }
        else 
        {
            die("Error : " . mysqli_error($this->connection));
        }
    }



    //  read data from db
    public function viewemployee($table)
    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->connection, $sql);
        $array = array();
        if (mysqli_query($this->connection, $sql)) 
        {
            if (mysqli_num_rows($result) > 0) 
            {
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $array[] = $row;
                }
            } 
            return $array;
        }
        else 
        {
            return  die("Error : " . mysqli_error($this->connection));
        }
    
    }



    //  get data of specific item 

    public function find($table,$id)
    {
        $id = filter_var($id,FILTER_VALIDATE_INT);
        $sql = "SELECT * FROM $table WHERE `id`='$id' LIMIT 1 ";
        $result = mysqli_query($this->connection,$sql);
        if(mysqli_query($this->connection,$sql))
        { 
            if (mysqli_num_rows($result) > 0) 
            {
              return mysqli_fetch_assoc($result);
            }
            else 
            {
                return false;
            }
        }
        else 
        {
            return die("Error : ".mysqli_error($this->connection));
        }
    }






    // update data in db 
    public function update($sql)
    {
        $result = mysqli_query($this->connection,$sql);
        if(mysqli_query($this->connection,$sql))
        { 
            return $this->updatedSuccess;
        }
        else 
        {
            return die("Error : ".mysqli_error($this->connection));
        }
    }



    // update data in db 
    public function deleteemployee($table,$id)
    {
        $sql = "DELETE FROM $table WHERE `id`='$id' ";
        $result = mysqli_query($this->connection,$sql);
        if(mysqli_query($this->connection,$sql))
        { 
            return $this->deletedSuccess;
        }
        else 
        {
            return die("Error : ".mysqli_error($this->connection));
        }
    }



    //  enrypt password 

    public function enc_password($password)
    {
        return sha1($password);
    }
}