<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name!=null?$this->name:'',
            "fname"=> $this->fname!=null?$this->fname:'',
            "email"=> $this->email!=null?$this->email:'',
            "phone"=> $this->phone!=null?$this->phone:'',
            "images"=> $this->images!=null?$this->images:'',
            "branch_id"=> $this->branch_id!=null?$this->branch_id:0,
            "school_id"=> $this->school_id!=null?$this->school_id:0,
            "school_id"=> $this->school_id!=null?$this->school_id:0,
            "emp_id"=> $this->emp_id!=null?$this->emp_id:0,
            "api_token"=> $this->api_token!=null?$this->api_token:'',
          
        ];
    }
}
