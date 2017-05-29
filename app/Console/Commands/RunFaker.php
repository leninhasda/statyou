<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Status;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
        $this->generateStatus();
    }

    protected function generateUsers($count = 5)
    {
        $faker = Faker::create();

        $emails = [];
        for($i = 0; $i < $count; $i++) {
            $email = $faker->email;
            list($first_name) = explode('@', $email);
            $last_name = $faker->lastName;
            $username = strtolower($first_name);
            $password = \Hash::make('password');
            $emails[] = $email;

            User::create([
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'username'      => $username,
                'email'         => $email,
                'password'      => $password,
            ]);
        }

        echo "Following users have been created with default password as 'password'".PHP_EOL;
        echo "".PHP_EOL;
        foreach ($emails as $email) {
            echo " ".$email.PHP_EOL;
        }
        echo "".PHP_EOL;
    }

    public function generateStatus($count = 500)
    {
        $faker = Faker::create();
        $user_ids = User::pluck('id');

        for ($i = 0; $i < $count; $i++) {
            $days = ['today', 'a day ago', '2 days ago', '3 days ago', '4 days ago', '5 days ago', '6 days ago'];
            $date = new Carbon($faker->randomElement($days));

            Status::create([
                'user_id' => $user_ids->random(),
                'content' => $faker->text(100),
                'type' => (string) $faker->randomElement([Status::Public, Status::Private]),
                'created_at' => $date->format('Y-m-d h:m:i'),
                'updated_at' => $date->format('Y-m-d h:m:i'),
            ]);
        }
    }
}
