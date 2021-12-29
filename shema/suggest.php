
<?php
// connect to db




include "dbEmisije.php";
$db = new Dbe();

$result = $db->connect()->query("SELECT NazivTipa FROM tipemisije");
 $data= array();
 while ($row = $result->fetch_assoc()){
     $data[]= $row;
 } 



$q = $_REQUEST['q'];

$suggestion = "";

if($q !==""){
    $q=strtolower($q);
    $len = strlen($q);
    foreach($data as $naziv){
        
        if(stristr($q, substr($naziv['NazivTipa'], 0, $len))){
            $x=$naziv['NazivTipa'];
            if($suggestion === ""){
                $suggestion = $x;
            } else{
                
                $suggestion .= ", $x";
            }
        }
    }
}

echo $suggestion ==="" ? "Nema kategorije" : $suggestion;





?>
