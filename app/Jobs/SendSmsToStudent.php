<?php

namespace App\Jobs;

use App\Jobs\Job;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSmsToStudent implements ShouldQueue
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


             
    }
}
