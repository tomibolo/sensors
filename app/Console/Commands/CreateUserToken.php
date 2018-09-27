<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateUserToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:createusertoken {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a Personal Token for Test User';

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
     * @return mixed
     */
    public function handle()
    {
        $token = User::find($this->argument('userId'))->createToken('Temp')->accessToken;
        $this->info($token);
    }
}
