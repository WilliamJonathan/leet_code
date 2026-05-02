<?php

// 1769. Minimum Number of Operations to Move All Balls to Each Box

// You have n boxes. You are given a binary string boxes of length n, where boxes[i] is '0' if the ith box is empty, and '1' if it contains one ball.

// In one operation, you can move one ball from a box to an adjacent box. Box i is adjacent to box j if abs(i - j) == 1. Note that after doing so, there may be more than one ball in some boxes.

// Return an array answer of size n, where answer[i] is the minimum number of operations needed to move all the balls to the ith box.

// Each answer[i] is calculated considering the initial state of the boxes.

 

// Example 1:

// Input: boxes = "110"
// Output: [1,1,3]
// Explanation: The answer for each box is as follows:
// 1) First box: you will have to move one ball from the second box to the first box in one operation.
// 2) Second box: you will have to move one ball from the first box to the second box in one operation.
// 3) Third box: you will have to move one ball from the first box to the third box in two operations, and move one ball from the second box to the third box in one operation.
// Example 2:

// Input: boxes = "001011"
// Output: [11,8,5,4,3,4]

class Solution {

    /**
     * @param string $boxes
     * @return int[]
     */
    public function minOperations(string $boxes): array {
    $operacoes = [];
    $lenCaixa = strlen($boxes);

        for ($i = 0; $i < $lenCaixa; $i++) {
            $totalCusto = 0; // Começa o custo da caixa atual em zero
            
            for ($j = 0; $j < $lenCaixa; $j++) {
                // Se a caixa 'j' tiver uma bola, calculamos a distância dela até 'i'
                if ($boxes[$j] == "1") {
                    $totalCusto += abs($i - $j);
                }
            }
            
            $operacoes[$i] = $totalCusto; // Guarda o total acumulado para a caixa i
        }
        
        return $operacoes;
    }
}

// Executa os exemplos do enunciado
$solver = new Solution();
$examples = [
    "110",
    "001011",
];

foreach ($examples as $boxes) {
    echo "Input: \"$boxes\" => Output: \"" . implode(',', $solver->minOperations($boxes)) . "\"\n";
}