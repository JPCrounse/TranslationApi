<?php

namespace App\Classes\Languages;

final class ParrotLanguage extends BaseLanguage
{
    public function translate(): BaseLanguage
    {
        $this->setText( $this->getText()->prependText("Ik praat je na, ") );
        return $this;
    }
}
