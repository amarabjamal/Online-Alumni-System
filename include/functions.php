<?php

function check_login($username, $password, $pdo) {
    if (isset($username) && isset($password)){

        $sql = "select * from admins WHERE email = '$username'";
        
        $account = $pdo->query($sql);
        $acc = $account->fetch();
    
        if(isset($acc['id'])){
            echo "Account Exists <br>";
            if(isset($acc['password'])){
                if($acc['password']==$password){
                    echo "Credentials correct <br>";
                    $_SESSION['admin_id'] = $acc['id'];
                    
                } else{
                    echo "Wrong account <br>";
                }
            }
        } else{
            echo "Account does not exist <br>";
        }
    
        
    }
  }

?>