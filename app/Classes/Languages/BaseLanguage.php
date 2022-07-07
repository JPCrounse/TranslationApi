<?php

namespace App\Classes\Languages;

use App\Classes\Helper\TextHelper;
use App\Interfaces\TranslationInterface;

abstract class BaseLanguage implements TranslationInterface
{
    public function __construct(protected TextHelper $text, private array $validWords = []){}

    public function convertWord(string $word): string
    {
        return $word;
    }

    public function translate(): self
    {
        $translatedWords = [];
        foreach($this->text->getWords() as $word)
        {
            $translatedWords[] = $this->convertWord($word);
        }
        $this->text->setWords($translatedWords);
        return $this;
    }

    public function validate(): bool
    {
        return true;
        $isValid = true;
        foreach($this->text->getWords() as $word)
        {
            if(!in_array($word, $this->validWords)) $isValid = false;
        }
        return $isValid;
    }

    public function setText(TextHelper $text): void
    {
        $this->text = $text;
    }

    public function getText(): TextHelper
    {
        return $this->text;
    }
}
