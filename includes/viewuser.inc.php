<?php


class ViewUser extends User{
    
    public function showAllUsers(){
    $datas= $this->getAllUsers();
    foreach ($datas as $data){
        echo $data['id']."<br>";
        echo $data['firstName']."<br>";
        

        // echo $data['pwd']."<br>";
    }
    
    
    }

}


?>