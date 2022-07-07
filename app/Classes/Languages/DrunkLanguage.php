<?php

namespace App\Classes\Languages;

class DrunkLanguage extends BaseLanguage
{
    function translate(): BaseLanguage
    {
        $translatedWords = [];
        foreach($this->text->getWords() as $index => $word)
        {
            $translatedWords[] = ($index % 4 == 3) ? strrev($word) : $word;
        }
        $this->text
            ->setWords($translatedWords)
            ->injectBisectingSentence(" Proost!")
            ->appendText("Burp!");
        return $this;
    }
}
