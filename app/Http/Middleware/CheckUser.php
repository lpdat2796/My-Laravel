<?php

namespace App\Http\Middleware;
use App\tbluser;
use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $code=$request->code;
        //$email=$req->email;
        $checkUser=tbluser::where(['code'=>$code/* ,'email'=>$email */])->first();
        if(!$checkUser)
        {
            return redirect()->route('dangnhap')->with(['flag'=>'danger','message'=>'Xin lỗi! Đường dẫn link này không đúng, bạn vui lòng thử lại sau.']);
        }
        return $next($request);
    }
}
