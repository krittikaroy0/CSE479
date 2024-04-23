<?php 

function getUserById($email, $db){
    $sql = "SELECT * FROM faculty WHERE email = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$email]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>