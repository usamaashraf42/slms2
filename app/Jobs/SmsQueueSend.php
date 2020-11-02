<?php

namespace App\Jobs;

use App\Models\SmsSendLog;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Auth;
class SmsQueueSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $phone;
    protected $branch_id;
    protected $class_id;
    protected $sms;
    protected $sms_title;
    protected $std_id;


    public function __construct($phone,$sms,$sms_title,$std_id,$branch_id,$class_id)
    {

        $this->phone=$phone;
        $this->sms=$sms;
        $this->sms_title=$sms_title;
        $this->std_id=$std_id;
        $this->branch_id=$branch_id;
        $this->class_id=$class_id;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sms=strip_tags($this->sms);
        $log=SendSms($this->phone,$sms);
             
          

            SmsSendLog::create([
                'std_id'=>$this->std_id,
                'branch_id'=>$this->branch_id,
                'class_id'=>$this->class_id,
                'created_by'=>Auth::user()->id,
                'sms_title'=>$this->sms_title,
                'sms_body'=>$this->sms,
                'phone'=>$this->phone,
                'description'=>isset($log)?$log:null,
            ]);
    }
}
