<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Redirect;
class ZeSocialBusiness
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $result = $this->check($request);
        if ($result=== true)
        {
            return $next($request);
        }
        return Redirect::to('/Auth');
    }

    public function check($request){
        $result = false;
        $dataRequest = $request->session();
        if (Session::has('zeAccessKey'))
        {
            if($dataRequest->all()['zeAccessKey'] && $dataRequest->all()['zeAccessKey']==Session::get('zeAccessKey')){
                
               $result=true;
            }
        }else{
            if($request->server()['REQUEST_URI'] =='/Auth' || $request->server()['REQUEST_URI']=='/Auth/admin-profile' || $request->server()['REQUEST_URI']=='/Auth/login'){
                $result= true;
            }
        }

        return $result;

    }

}