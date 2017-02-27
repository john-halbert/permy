<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Permute
 */
 final class PermuteTest extends TestCase {
     public function testHat() {
         $permutator = new Permute('hat');
         $this->assertEquals(
            ["aht","ath","hat","hta","tah","tha"],
            $permutator->getPermutations()
         );
         return;
     }
     public function testAbc() {
         $permutator = new Permute('abc');
         $this->assertEquals(
            ["abc","acb","bac","bca","cab","cba"],
            $permutator->getPermutations()
         );
         return;
     }
     public function testZu6() {
         $permutator = new Permute('Zu6');
         $this->assertEquals(
            ["6Zu","6uZ","Z6u","Zu6","u6Z","uZ6"],
            $permutator->getPermutations()
         );
         return;
     }
 }