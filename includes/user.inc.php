<?php
include_once("dbh.inc.php");


class User extends Dbh{
    
    public function getAllUsers(){
        $dbh= new Dbh();
        $sql = "SELECT * FROM users";
        
        
        
        $result = $dbh->connect()->query($sql);
        
        
        if(!empty($result) && $result->num_rows > 0){
            $numRows = $result->num_rows;
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
        else{
            print("Doslo je do greske");
        }
    
    }

    public function exist($key, $value){
        $dbh= new Dbh();

        $email="None";
        if($key == "email")
            $email = $value;
        if($key == "password")
            $username = $value;


        if($key == "email")
        {

            
            $sql="SELECT * FROM users WHERE email='$value'";
        
        $result = $dbh->connect()->query($sql);
            if($result -> num_rows >0){
                return 'Email vec postoji';
        }
        }

        if($key == "username")
        {
        $sql="SELECT id FROM users WHERE firstName='$value'";
     
        $result = $dbh->connect()->query($sql);
        if($result -> num_rows >0){
            return 'Username vec postoji';
        }
        }
        
        return false;



    }
    public function write($query){
        $dbh= new Dbh();

		
		$result = $dbh->connect()->query($query);

		if($result){
			return true;
		}else{
			return false;
		}
	}
}




?>