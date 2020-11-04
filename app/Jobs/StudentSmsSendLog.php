<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Auth;
use App\Models\SmsSendLog;
class StudentSmsSendLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $stds;
    protected $sms;
    protected $sms_title;

    public function __construct($stds,$sms ,$sms_title)
    {
        $this->stds=$stds;
        $this->sms=$sms;
        $this->sms_title=$sms_title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sms=strip_tags($this->sms);
        foreach ($this->stds as $std) {
            $log='outstanding sms';
            
            if($std->status  && $std->is_active  && ($std->emergency_mobile)){
                
                if(isset($std) && $std->emergency_mobile or $std->s_phoneNo){
                    
                    $phone=$std->s_phoneNo?$std->s_phoneNo:$std->emergency_mobile;
                    $std_id=$std->id;
                    $branch_id=$std->branch_id;
                    $class_id=$std->course_id;

                    $sms=strip_tags($this->sms);
                    $log=SendSms($phone,$sms);

                }
                
            }

            
        }
    }
}
