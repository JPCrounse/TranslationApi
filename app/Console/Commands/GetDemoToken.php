<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GetDemoToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:demo-token';

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
        echo User::where('email', 'demo@domain.com')->first()->createToken('api-token')->plainTextToken;
        return 0;
    }
}
