<?php 

class Permute {

    private $permutations = [];

    public function __construct(string $inputs){
        $input = $this->parseInputs($inputs);
        $permuted = $this->permutate($input);
        $this->permutations = $this->sort($permuted); 
    }

    private function parseInputs($inputs) {
        return str_split($inputs);
    }
    
    private function sort ($inputs) {
        $sorted = [];
        foreach ($inputs as $input){
            $sorted[] = implode("", $input);
        }
        sort($sorted);
        return $sorted;
    }

    private function permutate(array $words, array $permutations = [], array &$permutationArray = []) {
        if (empty($words)){
            array_push($permutationArray, $permutations);
        }
        for ($i = 0; $i < count($words); $i++) {
            array_push($permutations, $words[$i]);
            $wordsArray = $words;
            array_splice($wordsArray, $i, 1);
            $this->permutate($wordsArray, $permutations, $permutationArray);
            array_pop($permutations);
        }
        return $permutationArray;
    } //inspired from http://stackoverflow.com/a/25229869

    public function getPermutations () {
        return array_unique($this->permutations);
    }
}

?>