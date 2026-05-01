// 1768. Merge Strings Alternately — Versão profissional em Rust
//
// Explicação (PT-BR):
// - A função `merge_alternately` recebe duas &str e retorna uma `String`
//   resultante da mesclagem alternada dos caracteres (começando por word1).
// - Utilizamos iteradores de `chars()` para tratar corretamente caracteres
//   Unicode (multibyte).
// - A implementação evita indexação O(n^2) por `nth()` dentro do loop e usa
//   `next()` nos iteradores, que é O(1) amortizado.

/// Mescla duas strings alternadamente, tratando corretamente caracteres Unicode.
fn merge_alternately(word1: &str, word2: &str) -> String {
    // Reserva capacidade aproximada em bytes para evitar realocações frequentes.
    // `len()` retorna bytes, que é uma estimativa aceitável para capacidade.
    let mut result = String::with_capacity(word1.len() + word2.len());

    // Criamos iteradores sobre os caracteres (Unicode-aware)
    let mut a = word1.chars();
    let mut b = word2.chars();

    loop {
        match a.next() {
            Some(ch) => result.push(ch),
            None => {
                // Se `a` acabou, adiciona o restante de `b` e termina
                result.extend(b);
                break;
            }
        }

        match b.next() {
            Some(ch) => result.push(ch),
            None => {
                // Se `b` acabou, adiciona o restante de `a` e termina
                result.extend(a);
                break;
            }
        }
    }

    result
}

// Pequeno `main` para demonstrar a função com os exemplos do enunciado.
fn main() {
    let examples = [
        ("abc", "pqr"),
        ("ab", "pqrs"),
        ("abcd", "pq"),
    ];

    for (w1, w2) in &examples {
        println!(
            "Input: \"{}\", \"{}\" => Output: \"{}\"",
            w1,
            w2,
            merge_alternately(w1, w2)
        );
    }
}
