<?php

    // 1768. Merge Strings Alternately
    // You are given two strings word1 and word2. 
    // Merge the strings by adding letters in alternating order, 
    // starting with word1. 
    // If a string is longer than the other, append the additional letters onto the end of the merged string.

    // Return the merged string.

    // Example 1:

    // Input: word1 = "abc", word2 = "pqr"
    // Output: "apbqcr"
    // Explanation: The merged string will be merged as so:
    // word1:  a   b   c
    // word2:    p   q   r
    // merged: a p b q c r
    // Example 2:

    // Input: word1 = "ab", word2 = "pqrs"
    // Output: "apbqrs"
    // Explanation: Notice that as word2 is longer, "rs" is appended to the end.
    // word1:  a   b 
    // word2:    p   q   r   s
    // merged: a p b q   r   s
    // Example 3:

    // Input: word1 = "abcd", word2 = "pq"
    // Output: "apbqcd"
    // Explanation: Notice that as word1 is longer, "cd" is appended to the end.
    // word1:  a   b   c   d
    // word2:    p   q 
    // merged: a p b q c   d


    // Constraints:

    // 1 <= word1.length, word2.length <= 100
    // word1 and word2 consist of lowercase English letters.

class Solution {

    /**
     * @param string $word1
     * @param string $word2
     * @return string
     */
    public function mergeAlternately(string $word1, string $word2): string {
        $saida = "";
        if (mb_strlen($word1) == mb_strlen($word2)) {
            for ($i=0;$i < mb_strlen($word1); $i++) {
                $saida .= $word1[$i] . $word2[$i];
            }
            return $saida;
        }
        if (mb_strlen($word1) < mb_strlen($word2)) {
            $posicao = 0;
            for ($i=0;$i < mb_strlen($word1); $i++) {
                $saida .= $word1[$i] . $word2[$i];
                $posicao = $i;
            }
            $saida .= substr($word2, $posicao + 1);
            return $saida;
        }
        if (mb_strlen($word1) > mb_strlen($word2)) {
            $posicao = 0;
            for ($i=0;$i < mb_strlen($word2); $i++) {
                $saida .= $word1[$i] . $word2[$i];
                $posicao = $i;
            }
            $saida .= substr($word1, $posicao + 1);
            return $saida;
        }
        return $saida;
    }
}

// Executa os exemplos do enunciado
$solver = new Solution();
$examples = [
    ['abc', 'pqr'],
    ['ab',  'pqrs'],
    ['abcd', 'pq'],
];

foreach ($examples as [$w1, $w2]) {
    echo "Input: \"$w1\", \"$w2\" => Output: \"" . $solver->mergeAlternately($w1, $w2) . "\"\n";
}