<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\AssignedRoles;

class Admins implements Middleware {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The response factory implementation.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @param  ResponseFactory  $response
     * @return void
     */
    public function __construct(Guard $auth,
                                ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/*
		if(!Auth::check()){
			return redirect('admin/login');
		}
		*/
		//return $next($request);
        if ($this->auth->check())
        {
            if(!$this->auth->user()->type=='teacher')
            {
                //$admin=1;
				return $next($request);
            }
            else if(!$this->auth->user()->type=='admin')
            {
                //$admin=1;
                return $next($request);
            }
			/*
            if($admin==0){
                return $this->response->redirectTo('/');
            }
			*/
            return $this->response->redirectTo('admin/login');
            
			
        }
       // return $this->response->redirectTo('/');
	}

}
