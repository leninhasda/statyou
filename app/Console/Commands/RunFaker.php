<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunFaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faker:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates DB with fake data using Faker package.';

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
        $this->generateUsers();
    }

    protected function generateUsers()
    {
        $user = new \App\User;
        $user->first_name = 'Lenin';
        $user->last_name = 'Hasda';
        $user->username = 'lenin';
        $user->email = 'lenin@hasda.me';
        $user->password = \Hash::make('password');
        $user->save();
    }
}
