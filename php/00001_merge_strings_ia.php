<?php
declare(strict_types=1);

/**
 * 1768. Merge Strings Alternately — Versão profissional comentada (PT-BR)
 *
 * Esta classe implementa a solução para mesclar duas strings alternadamente,
 * começando por $word1. A implementação usa funções multibyte (mb_*) para
 * suportar corretamente caracteres que podem ocupar múltiplos bytes (por exemplo
 * acentos ou caracteres Unicode).
 */
class Solution
{
    /**
     * Mescla duas strings alternadamente, começando por $word1.
     *
     * Explicação passo a passo:
     * - Calculamos o comprimento de cada string com `mb_strlen` (seguros para
     *   caracteres multibyte).
     * - Determinamos o tamanho máximo (`$max`) — o número de iterações necessárias
     *   para percorrer a maior das duas strings.
     * - Em um loop de 0 até $max-1, adicionamos um caractere de cada string quando
     *   o índice atual for válido para aquela string.
     * - Usamos `mb_substr(..., 1)` para extrair um único caractere multibyte por vez
     *   e armazenamos os pedaços em um array `$parts`.
     * - No final, juntamos os pedaços com `implode('', $parts)` e retornamos a string
     *   resultante.
     *
     * @param string $word1 Primeira string (inicia a mesclagem)
     * @param string $word2 Segunda string
     * @return string String mesclada
     */
    public function mergeAlternately(string $word1, string $word2): string
    {
        // Obtém os comprimentos das strings (multibyte-safe)
        $len1 = mb_strlen($word1);
        $len2 = mb_strlen($word2);

        // Determina quantas iterações o loop deve executar — equivalente ao
        // comprimento da string mais longa
        $max = $len1 > $len2 ? $len1 : $len2;

        // Armazena os caracteres na ordem desejada antes de concatenar para
        // evitar concatenações repetidas de strings (mais eficiente)
        $parts = [];

        // Para cada posição até $max - 1, adicionamos o caractere de $word1
        // seguido do caractere de $word2 (se existirem nesses índices)
        for ($i = 0; $i < $max; $i++) {
            // Se $i for menor que o comprimento de $word1, pega o caractere
            if ($i < $len1) {
                // `mb_substr($word1, $i, 1)` pega o caractere na posição $i
                $parts[] = mb_substr($word1, $i, 1);
            }

            // Se $i for menor que o comprimento de $word2, pega o caractere
            if ($i < $len2) {
                $parts[] = mb_substr($word2, $i, 1);
            }
        }

        // Une todos os pedaços em uma única string e retorna
        return implode('', $parts);
    }
}

/**
 * Bloco CLI (opcional): quando o arquivo for executado diretamente via PHP-CLI,
 * instanciamos a classe e rodamos alguns exemplos para que você veja a saída.
 *
 * Verificações:
 * - `PHP_SAPI === 'cli'` garante que estamos em modo linha de comando.
 * - `basename(__FILE__) === basename($_SERVER['argv'][0])` evita que o bloco
 *   seja executado quando o arquivo for incluído por outro script.
 */
if (PHP_SAPI === 'cli' && basename(__FILE__) === basename($_SERVER['argv'][0])) {
    $solver = new Solution();

    // Exemplos do enunciado — formato: [word1, word2]
    $examples = [
        ['abc', 'pqr'],
        ['ab', 'pqrs'],
        ['abcd', 'pq'],
    ];

    // Percorre os exemplos e imprime a entrada e a saída formatada
    foreach ($examples as [$w1, $w2]) {
        // A chamada ao método retorna a string mesclada
        $result = $solver->mergeAlternately($w1, $w2);
        echo "Input: \"$w1\", \"$w2\" => Output: \"" . $result . "\"\n";
    }
}

