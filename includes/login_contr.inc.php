<?php


function is_input_empty(string $username, string $pwd ){
    if(empty($username) ||empty($pwd)){
    
        return true;
    }
    else {
      return false;  
    }
    }

function is_username_wrong( bool|array $result){

if(!$result){ # no data in database
  return true;
}
else{
return false;
}
}


function is_password_wrong( string $pwd, string $hashedPwd ){

  if(!password_verify($pwd, $hashedPwd)){ #if the password == hashed password
    return true;
  }
  else{
  return false;
  }
  }

?>