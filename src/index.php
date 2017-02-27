<?php 

use \Permute as Permute;

spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
}); //won't work with CLI


$input = filter_input(INPUT_POST, "words", FILTER_SANITIZE_STRING);

if(empty($input)){
    http_response_code(400);
    die();
}

$permutator = new Permute($input);
$perms = $permutator->getPermutations();

if(!empty($perms)){
    echo json_encode($perms);
}else {
    http_response_code(500);
}

?>