<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Auth;
use App\Models\SmsSendLog;

class OutstandingSMSendController implements ShouldQueue
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
                
                if(isset($std->student->emergency_mobile) && $std->student->status && && $std->student->is_active  && ($std->student->emergency_mobile)){
                    
                    if(isset($std->student) && $std->student->emergency_mobile or $std->student->s_phoneNo){
                        $phone=$std->student->s_phoneNo?$std->student->s_phoneNo:$std->student->emergency_mobile;
                        $std_id=$std->student->id;
                        $branch_id=$std->student->branch_id;
                        $class_id=$std->student->course_id;

                        $sms=strip_tags($this->sms);
                        $log=SendSms($phone,$sms);
                             
                          

                             SmsSendLog::create([
                                 'std_id'=>$std_id,
                                 'branch_id'=>$branch_id,
                                 'class_id'=>$class_id,
                                 'created_by'=>Auth::user()->id,
                                 'sms_title'=>$this->sms_title,
                                 'sms_body'=>$this->sms,
                                 'phone'=>$phone,
                                 'description'=>isset($log)?$log:null,
                                ]);



                    }
                    
                }

              
            }
    }
}
