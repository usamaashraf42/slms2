<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Jobs\Job;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsToStudent extends Job implements SelfHandling, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public function __construct($request)
    {
        $this->request=$request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $sms=strip_tags($request->sms_body);
                $log=SendSms($request->phone,$sms);
             
                SmsSendLog::create([
                 'created_by'=>Auth::user()->id,
                 'sms_title'=>$request->sms_title,
                 'sms_body'=>$request->sms_body,
                 'phone'=>$request->phone,
                 'description'=>isset($log)?$log:null,
             ]);


                return 1;
    }
}
