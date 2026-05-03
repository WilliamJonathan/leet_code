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

struct Solution;

impl Solution {
    pub fn min_operations(boxes: String) -> Vec<i32> {
        let n = boxes.len();
        let boxes_bytes = boxes.as_bytes();
        let mut operacoes = vec![0; n];
        
        // Passagem da esquerda para direita
        // Calcula o custo de mover todas as bolas da esquerda para a posição atual
        let mut bolas_esquerda = 0;
        let mut custo_esquerda = 0;
        
        for i in 0..n {
            operacoes[i] += custo_esquerda;
            
            if boxes_bytes[i] == b'1' {
                bolas_esquerda += 1;
            }
            
            // Para a próxima posição, todas as bolas à esquerda estarão 1 posição mais longe
            custo_esquerda += bolas_esquerda;
        }
        
        // Passagem da direita para esquerda
        // Calcula o custo de mover todas as bolas da direita para a posição atual
        let mut bolas_direita = 0;
        let mut custo_direita = 0;
        
        for i in (0..n).rev() {
            operacoes[i] += custo_direita;
            
            if boxes_bytes[i] == b'1' {
                bolas_direita += 1;
            }
            
            // Para a próxima posição (à esquerda), todas as bolas à direita estarão 1 posição mais longe
            custo_direita += bolas_direita;
        }
        
        operacoes
    }
}

fn main() {
    // Testar ambos os exemplos fornecidos
    let boxes1 = "110".to_string();
    let resultado1 = Solution::min_operations(boxes1);
    println!("{:?}", resultado1);

    let boxes2 = "001011".to_string();
    let resultado2 = Solution::min_operations(boxes2);
    println!("{:?}", resultado2);
}
