<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * 命令名称及签名
     *
     * @var string
     */
    protected $signature = 'email:send {user}';

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

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
        $user = $this->argument('user');
        $this->info('Display this on the screen, user ' . $user);
        return 0;
    }
}
