<?php

namespace App\Classes\Helper;

class TextHelper
{
    public function __construct(private string $text, private string $preText = '', private string $postText = ''){}

    public function getWords(): array
    {
        return explode(' ', $this->text);
    }

    public function setWords(array $words): self
    {
        $this->text = implode(' ', $words);
        return $this;
    }

    public function getSentences(): array
    {
        //TODO: What about other line endings such as "?", "!" or ";"
        //TODO: Handle sequential line ending chars e.g. "?!"
        return explode('.', $this->text);
    }

    public function setSentences(array $sentences): self
    {
        $this->text = implode('.', $sentences);
        return $this;
    }

    public function prependText(string $text): self
    {
        $this->preText = "{$text}{$this->preText} ";
        return $this;
    }

    public function appendText(string $text): self
    {
        $this->postText = " {$this->postText}{$text}";
        return $this;
    }

    public function injectSentence(string $sentence, int $position): self
    {
        $sentences = $this->getSentences();
        if(isset($sentences[$position]))
        {
            array_splice($sentences, $position, 0, [$sentence]);
            $this->setSentences($sentences);
        } else {
            //TODO throw TextHelperException
        }
        return $this;
    }

    public function injectBisectingSentence(string $sentence): self
    {
        $sentences = $this->getSentences();
        if(count($sentences) > 1 && count($sentences) % 2 == 0)
        {
            $this->injectSentence($sentence, count($sentences) / 2);
        }
        else
        {
            //TODO: Unspecified condition, throw TextHelperException?
        }
        return $this;
    }

    public function output(): string
    {
        return "{$this->preText}{$this->text}{$this->postText}";
    }
}
