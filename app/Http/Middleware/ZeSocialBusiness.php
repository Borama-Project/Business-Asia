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
        
        if ($this->check($request))
        {
            // return $next($request);
            return $next($request);
        }
        dd($request->server()['REDIRECT_URL']);
        // return Redirect::to('/Auth');
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
            if($request->server()['REDIRECT_URL'] =='/Auth' || $request->server()['REDIRECT_URL'] =='/' || $request->server()['REDIRECT_URL']='/Auth/admin-profile'){
                return $result=true;
            }
        }

        return $result;

    }

}