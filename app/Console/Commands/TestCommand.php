<?php

namespace App\Console\Commands;

use App\Classes\Factories\LanguageFactory;
use App\Classes\Helper\TextHelper;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $input = "What is the airspeed velocity of an unladen swallow? An african swallow or a european swallow?";
        $input = "What is the airspeed velocity of an unladen swallow. An african swallow or a european swallow?";

        $factory = new LanguageFactory();
        $text = new TextHelper($input);

//        $language = $factory->getLanguage('drunk', 'This is a test sentence');
//        echo $language->translate()->getText()->output();

//        $text = $factory->getLanguage('labrador', $text)->translate()->getText();
        $text = $factory->getLanguage('drunk', $text)->translate()->getText();

        echo $text->output();

        return 0;
    }
}
