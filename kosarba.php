<?php
	
	
	
	if(isset($_POST['submit']))
    {
        $errors= array();
        $true = true;
        if(empty($_POST['darab']))
        {
            $true = false;
            array_push($errors, "Darabszámot kötelező megadni");
		}
        
        if($true)
        {
            $termeknev= ( $_POST['termeknev']);
            $termekar= $_POST['termekar'];
            $darab=$_POST['darab'];
			$user_ID= 'user_ID';
			

            $sql  = "INSERT INTO  kosaram(név, darab, egységár)  VALUES  (NULL,$user_ID, NOT NULL,'$termeknev','$termekar', '$darab')";
            $query = $db->query($sql);
            
            if($query)
            {
		   session_start();
		   $_SESSION['termeknev'] = "$termeknev a kosárba helyeztük!";
           header('location: index.php');}
        } 
        
    }
 
	
?>