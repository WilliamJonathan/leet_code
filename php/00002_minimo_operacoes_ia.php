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

// VERSÃO OTIMIZADA - Complexidade O(n) ao invés de O(n²)
// Usa duas passagens: uma da esquerda para direita e outra da direita para esquerda

class Solution {

    /**
     * @param string $boxes
     * @return int[]
     */
    public function minOperations(string $boxes): array {
        $n = strlen($boxes);
        $operacoes = array_fill(0, $n, 0);
        
        // Passagem da esquerda para direita
        // Calcula o custo de mover todas as bolas da esquerda para a posição atual
        $bolasEsquerda = 0;
        $custoEsquerda = 0;
        
        for ($i = 0; $i < $n; $i++) {
            $operacoes[$i] += $custoEsquerda;
            
            if ($boxes[$i] == '1') {
                $bolasEsquerda++;
            }
            
            // Para a próxima posição, todas as bolas à esquerda estarão 1 posição mais longe
            $custoEsquerda += $bolasEsquerda;
        }
        
        // Passagem da direita para esquerda
        // Calcula o custo de mover todas as bolas da direita para a posição atual
        $bolasDireita = 0;
        $custoDireita = 0;
        
        for ($i = $n - 1; $i >= 0; $i--) {
            $operacoes[$i] += $custoDireita;
            
            if ($boxes[$i] == '1') {
                $bolasDireita++;
            }
            
            // Para a próxima posição (à esquerda), todas as bolas à direita estarão 1 posição mais longe
            $custoDireita += $bolasDireita;
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
