<?php 

spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
}); 

$queue = [];

if(php_sapi_name() === 'cli') {
    $input = $argv[1];
    if(empty($input)){
        echo "Unknown parameters. Use: php index.php [wordfile]";
        die();
    }

    if(pathinfo($input)['extension'] === 'txt'){
        $inputs = explode("\n", file_get_contents($input));
        
        foreach ($inputs as $input){
            if(strlen($input) >= 6 ){ //don't slam hosts' memory
                echo "$input is too long. Skipping.";
            } else {
                $queue[] = trim($input);
            }
        }
    } 
}
foreach ($queue as $item){
    try {
        $permutator = new Permute($item);
        $perms = $permutator->getPermutations();
        if(empty($perms)){ //handle web responses
            echo "Something went wrong, try again.";
            die();
        }
        echo implode(", ", $perms);
        echo "\n\n\n";
    } catch (Exception $e){
        echo "Something went wrong.";
        die();
    }
}

?>