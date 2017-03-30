<?php 

spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
}); 

$input = filter_input(INPUT_POST, "words", FILTER_SANITIZE_STRING);

if(empty($input)){
    http_response_code(400);
    die();
}

if(strlen($input) >=6 ){ //don't slam hosts' memory
    http_response_code(413);
    die();
}

try {
    $permutator = new Permute($input);
    $perms = $permutator->getPermutations();
} catch (Exception $e){
    http_response_code(500);
    die();
}

if(empty($perms)){ 
    http_response_code(500);
    die();
} 
echo json_encode($perms);

?>