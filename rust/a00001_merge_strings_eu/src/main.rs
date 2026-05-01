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

struct Solution;

impl Solution {
    pub fn merge_alternately(word1: String, word2: String) -> String {
        // comprimento das duas strings, mesmo que seja caracteres especiais
        let len1 = word1.chars().count();
        let len2 = word2.chars().count();

        // Determina quantos iterações o loop vai ter
        let max = if len1 > len2 {len1} else {len2};
        
        // lista que vai armazenar os caracteres para depois concatena-los
        let mut parts = vec![];

        // Percorre cada posição até o maximo - 1
        // adicionando os caracteres de word1 e em seguida de word2
        // se um deles não tiver o indice itera apenas o que tiver indice a percorrer
        for i in 0..max {
            if i < len1 {
                let letra = word1.chars().nth(i);
                parts.push(letra);
            }
            if i < len2 {
                let letra = word2.chars().nth(i);
                parts.push(letra);
            }
        }

        // Concatenar todas as letras
        let resultado = parts.into_iter().flatten().collect();
        return resultado;
    }
}

// Pequeno main para testar a função
fn main() {
    let word1 = "abc".to_string();
    let word2 = "pqr".to_string();
    let resultado = Solution::merge_alternately(word1, word2);
    println!("{}", resultado); // Deve imprimir "apbqcr"
}