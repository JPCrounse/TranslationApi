<?php

namespace App\Interfaces;

use App\Classes\Helper\TextHelper;

interface TranslationInterface
{
    public function setText(TextHelper $text): void;
    public function getText(): TextHelper;
    public function translate(): self;
    public function validate(): bool;
}
