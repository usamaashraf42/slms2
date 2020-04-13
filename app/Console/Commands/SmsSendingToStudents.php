<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SmsSendLog;

class SmsSendingToStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    public $request;

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
     * @return mixed
     */
    public function handle()
    {
        SmsSendLog::create([
                 'std_id'=>10001,
                 'branch_id'=>0,
                 'class_id'=>0,
                 // 'created_by'=>Auth::user()->id,
                 'sms_title'=>'cron job',
                 'sms_body'=>'cron job testing',
                 'phone'=>'03076110561',
                 'description'=>'cron job tstin',
                ]);
    }
}
