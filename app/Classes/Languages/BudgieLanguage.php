<?php

namespace App\Classes\Languages;

class BudgieLanguage extends BaseLanguage
{
    private array $vowels = ['a', 'e', 'i', 'o', 'u'];

    function convertWord(string $word): string
    {
        return in_array(substr($word, 0, 1), $this->vowels) ? 'tjilp' : 'piep';
    }
}
