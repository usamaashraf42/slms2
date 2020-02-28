<?php

namespace App\Http\Controllers\Web\Muscat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index(){
    	return view('web.muscat.index');
    }
    public function nursery(){
    	return view('web.muscat.nursary');
    }
    public function school(){
    	return view('web.muscat.omanschool');
    }
    public function academy(){
    	return view('web.muscat.accadmin_nursery');
    }
     public function academys(){
        return view('web.muscat.accadmin_school');
    }
        public function jobs(){
        return view('web.muscat.jobs');
    }
     public function ceo_messege(){
        return view('web.muscat.ceo_messege');
    }
     public function ceo_messege_school(){
        return view('web.muscat.ceo_messege_school');
    }
       public function curriculum(){
        return view('web.muscat.curriculum');
    }
     public function curriculum_school(){
        return view('web.muscat.curriculum_school');
    }
    public function news_nursery(){
        return view('web.muscat.news_nursery');
    }
    public function event_nursery(){
        return view('web.muscat.event_nursery');
    }
     public function news_school(){
        return view('web.muscat.news_school');
    }
        public function event_school(){
        return view('web.muscat.event_school');
    }
       public function faq(){
        return view('web.muscat.faq');
    }
        public function contact(){
        return view('web.muscat.contact');
    }
            public function contact_school(){
        return view('web.muscat.contact_school');
    }
}
