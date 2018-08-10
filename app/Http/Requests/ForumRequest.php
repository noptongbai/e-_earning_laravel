<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ForumRequest extends Request
{
    public function rules()
    {
       
           
               return [ 'title' => 'required|unique:forum_groups'];
               
          
    }   
    public function messages()
    {
    
            
                return ['title.unique' => 'Someone already has this name'];
           
        
    }

    public function authorize()
    {
        
            return true;
        
    }
}
