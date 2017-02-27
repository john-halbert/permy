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
     public function testFourLetters() {
         $permutator = new Permute('asdf');
         $this->assertEquals(
            ["adfs", "adsf", "afds", "afsd", "asdf", "asfd", "dafs", "dasf", "dfas", "dfsa", "dsaf", "dsfa", "fads", "fasd", "fdas", "fdsa", "fsad", "fsda", "sadf", "safd", "sdaf", "sdfa", "sfad", "sfda"],
            $permutator->getPermutations()
         );
         return;
     }
     public function testFourNumbers() {
         $permutator = new Permute('1111');
         $this->assertEquals(
            [1111],
            $permutator->getPermutations()
         );
         return;
     }
     public function testTwoNumbers() {
         $permutator = new Permute('11');
         $this->assertEquals(
            [11],
            $permutator->getPermutations()
         );
         return;
     }
 }