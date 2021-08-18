<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin';

    /**
     * User model.
     *
     * @var object
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $details = $this->getDetails();

        $admin = $this->user->createAdmin($details);

        $this->display($admin);
    }

    private function getDetails() : array
    {
        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');

//        if (! $this->isMatch($details['password'], $details['confirm_password'])) {
//            $this->error('Password and Confirm password do not match');
//        }

        return $details;
    }

    private function display(User $admin) : void
    {
        $headers = ['Name', 'Email', 'Is admin'];

        $fields = [
            'name' => $admin->name,
            'email' => $admin->email,
            'is_admin' => $admin->isAdmin()
        ];

        $this->info('Admin created');
        $this->table($headers, [$fields]);
    }

    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
}
