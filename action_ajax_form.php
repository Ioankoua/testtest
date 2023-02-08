<?php

require_once('db.php');

index($conn);

function index($conn){
	if (isset($_POST)) { 
		validate($_POST);
      insertData($_POST, $conn);
      getData($conn);

      message('success', 'Your registration is successful', ''); 
	}
}

function validate($post) 
{
    if(strlen($post['name']) <= 3 || strlen($post['name']) > 20){
	   message('error', 'The name must be at least 3 and no more than 20 and characters', 'name');
    }

    if(strlen($post['surname']) <= 3 || strlen($post['surname']) > 20){
	   message('error', 'The surname must be at least 3 and no more than 20 and characters', 'surname');
    }

    if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
	   message('error', 'This email not correct', 'email');
    }

    if(strlen($post['password']) <= 3 || strlen($post['surname']) > 20){
	   message('error', 'The password must be at least 3 and no more than 20 and characters', 'pass');
    }else{
    	if($post['password'] != $post['repeat-password']){
    		message('error', 'Password mismatch', 'pass');
    	}
    }
}

function insertData($post, $conn)
{
   $name = $post['name'];
   $surname = $post['surname'];
   $email = $post['email'];
   $password = password_hash($post['password'], PASSWORD_DEFAULT);

   $sql = "INSERT INTO test (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
   $conn->query($sql);
}

function getData($conn)
{
   $sql = "SELECT * FROM test";
   $result = $conn->query($sql);
   foreach($result as $row){
        if ($row['email'] != '') {
           $log = 'user '.$row['name'].' have email '.$row['email'];
           file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        }else{
           $log = 'user '.$row['name'].' not have email';
           file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        }
    }
}

function message($status, $message, $type)
{
   exit(json_encode(['status' => $status, 'message' => $message, 'type' => $type]));
}


?>