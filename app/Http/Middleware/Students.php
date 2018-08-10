<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\AssignedRoles;

class Students  {
	protected $auth;
	protected $response;
	
	public function __construct(Guard $auth, ResponseFactory $response){
        $this->auth = $auth;
        $this->response = $response;
    }	
	
	public function handle($request, Closure $next)
	{
		if ($this->auth->check()){
			if($this->auth->user()->type =='student'){
				return $next($request);
            }
            
		}
	
	

}
}
