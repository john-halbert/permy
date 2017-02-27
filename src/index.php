<?php 



spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
}); //won't work with CLI

$input;

if(php_sapi_name() === 'cli') {
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $input = trim($line);
}else {
    $input = filter_input(INPUT_POST, "words", FILTER_SANITIZE_STRING);
    if(empty($input)){
        http_response_code(400);
        die();
    }
}

if(strlen($input) >=6 ){ //don't slam my hosts' memory
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

if(empty($perms)){ //handle web responses
    if(php_sapi_name() === 'cli') {
        echo "Something went wrong, try again.";
        http_response_code(500);
        die();
    }
} else {
    if(php_sapi_name() === 'cli') {
        echo implode(", ", $perms);
    }else {
        echo json_encode($perms);
    }
}

?>