<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FeePostedSmSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
 
     protected $stds;
  
    public function __construct($stds)
    {
        $this->stds=$stds;
    
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->stds as $std) {
                if(isset($std->student->status) && $std->student->status && $std->student->is_active ){
                    
                    
                    if(isset($std->student) && $std->student->emergency_mobile or $std->student->s_phoneNo){
                        $phone=$std->student->s_phoneNo?$std->student->s_phoneNo:$std->student->emergency_mobile;
                        $std_id=$std->student->id;
                        $branch_id=$std->student->branch_id;
                        $class_id=$std->student->course_id;
                        $route=route('fee.billing',($std->id));
                        $month=get_month_name_by_no($std->fee_month);
                        $year=$std->fee_year;
                         $message=strip_tags("Dear Parent,\nNow you can pay the fee for the month of . $month-20 online.. To pay online,\nPlease click $route \nFulfil your responsibility now to avoid fine. If you have already paid, ignore this message.\nRegards,\nAmerican Lyceum");
                        (SendSms($phone,$message));

                    }
                    
                }

              
        }
    }
}
