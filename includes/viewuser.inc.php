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

  public function show_filtered_users($category){
    $datas= $this->filter_users($category);
    foreach ($datas as $data){
        echo $data['id']."<br>";
        echo $data['firstName']."<br>";
        

        // echo $data['pwd']."<br>";
    }
    
}

}


?>