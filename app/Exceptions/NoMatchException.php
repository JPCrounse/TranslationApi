<?php

namespace App\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class NoMatchException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Unable to determine an exact singular language match");
    }
}
