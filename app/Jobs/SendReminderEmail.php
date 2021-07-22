<?php

namespace App\Jobs;

use App\Http\Controllers\MailController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    private $goodsname;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $goodsname)
    {
        $this->user = $user;
        $this->goodsname = $goodsname;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MailController $mailController)
    {
        $user = $this->user;
        $username = $user->name;

        $mailController->sendMessage("商品注册提醒",   $username."注册了商品" . $this->goodsname);
    }

//    public function handle()
//    {
//        $mailer = new MailController();
//        $mailer->sendMessage("商品注册提醒",   "注册了商品");
//    }
}
