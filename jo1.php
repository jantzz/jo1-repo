<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $file_name='jo1storage'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
               if(array_key_exists("status", $_POST) == false){
                   $_POST['status'] = "pending";
               }                
            $extra=array( 
                'firstname' => $_POST['firstname'], 
                'lastname' => $_POST['lastname'], 
                'gradeLvl' => $_POST['gradeLvl'],
                'section' => $_POST['section'],
                'club' => $_POST['club'],
                'picture' => $_POST['picture'],
                'email' => $_POST['email'],
                'status' => $_POST['status'],
            ); 
            $array_data[]=$extra; 
            echo "file exist<br/>"; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'firstname' => $_POST['firstname'], 
                'lastname' => $_POST['lastname'], 
                'gradeLvl' => $_POST['gradeLvl'],
                'section' => $_POST['section'],
                'club' => $_POST['club'],
                'picture' => $_POST['picture'],
                'email' => $_POST['email'],
                'status' => "pending",
            ); 
            echo "file not exist<br/>"; 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='jo1storage'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo 'success'; 
    }                 
    else { 
        echo 'There is some error';                 
    } 
} 
   
    ?>