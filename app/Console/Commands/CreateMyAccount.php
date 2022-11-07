<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\userRepository;

class CreateMyAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createaccount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = 'vaclav';
        $password = '$2y$10$zCvsTf55AlTtiz/IGtMhU.HnfkAwkujquAfT6d14QbRWfxaScpKWy';
        $email = 'vaclav@email.cz';

        userRepository()->store($name, $email, $password);

        return 0;
    }
}
