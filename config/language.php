<?php

return [
    'human' => [
        'class' => \App\Classes\Languages\HumanLanguage::class,
        'input' => true,
        'output' => false,
        'matches' => ['labrador', 'poodle', 'budgie', 'parrot']
    ],
    'labrador' => [
        'class' => \App\Classes\Languages\LabradorLanguage::class,
        'input' => true,
        'output' => true,
        'valid_words' => ['woef'],
        'matches' => ['poodle', 'parrot']
    ],
    'poodle' => [
        'class' => \App\Classes\Languages\PoodleLanguage::class,
        'input' => true,
        'output' => true,
        'valid_words' => ['woefie'],
        'matches' => ['labrador', 'parrot']
    ],
    'parrot' => [
        'class' => \App\Classes\Languages\ParrotLanguage::class,
        'input' => false,
        'output' => true
    ],
    'budgie' => [
        'class' => \App\Classes\Languages\BudgieLanguage::class,
        'input' => true,
        'output' => true,
        'valid_words' => ["tjilp", "piep"],
        'matches' => ['parrot']
    ],
    'drunk' => [
        'class' => \App\Classes\Languages\DrunkLanguage::class,
        'input' => false,
        'output' => false
    ]
];
