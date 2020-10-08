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
                if(isset($std->student->emergency_mobile) && $std->student->status && $std->student->is_active  && ($std->student->emergency_mobile) ){
                    
                    if(isset($std->student) && $std->student->emergency_mobile or $std->student->s_phoneNo){
                        $phone=$std->student->s_phoneNo?$std->student->s_phoneNo:$std->student->emergency_mobile;
                        $std_id=$std->student->id;
                        $branch_id=$std->student->branch_id;
                        $class_id=$std->student->course_id;
                        $route=route('fee.billing',($std->id));
                        $month=get_month_name_by_no($std->fee_month);
                        $year=$std->fee_year;

                         $message=strip_tags("Dear Parent,\nToday is the last day to pay the fee for the month of $month-$year. To pay online,\nplease click $route \nPlease pay now to avoid fine.\nRegards,\nAmerican Lyceum");
                        (SendSms('03076110561',$message));

                    }
                    
                }

              
        }
    }
}
