<?php
declare(strict_types=1);

/**
 * 1768. Merge Strings Alternately — Versão profissional
 */
class Solution
{
    /**
     * Merge two strings alternately, starting with $word1.
     * Uses multibyte-safe functions and clear typing.
     *
     * @param string $word1
     * @param string $word2
     * @return string
     */
    public function mergeAlternately(string $word1, string $word2): string
    {
        $len1 = mb_strlen($word1);
        $len2 = mb_strlen($word2);
        $max = $len1 > $len2 ? $len1 : $len2;

        $parts = [];
        for ($i = 0; $i < $max; $i++) {
            if ($i < $len1) {
                $parts[] = mb_substr($word1, $i, 1);
            }
            if ($i < $len2) {
                $parts[] = mb_substr($word2, $i, 1);
            }
        }

        return implode('', $parts);
    }
}

// CLI helper: executa exemplos se o arquivo for chamado diretamente
if (PHP_SAPI === 'cli' && basename(__FILE__) === basename($_SERVER['argv'][0])) {
    $solver = new Solution();
    $examples = [
        ['abc', 'pqr'],
        ['ab', 'pqrs'],
        ['abcd', 'pq'],
    ];

    foreach ($examples as [$w1, $w2]) {
        echo "Input: \"$w1\", \"$w2\" => Output: \"" . $solver->mergeAlternately($w1, $w2) . "\"\n";
    }
}
