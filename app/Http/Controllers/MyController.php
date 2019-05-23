<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RequestResetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Socialite;
use App\SocialProvider;
use App\tblbaiviet;
use App\tbldanhmucbaiviet;
use App\tbluser;
use Hash;
use Session;
use Auth;
use App\User;
use Mail;
use Debugbar;
use Barryvdh\Debugbar\ServiceProvider;
use Carbon\Carbon;
use Cookie;
use App\Services\SocialFacebookAccountService;




class MyController extends Controller
{
    //
	public function Xinchao()
	{
		echo "Chao cac ban";
	}

	//Web
	public function getIndex()
	{
		$new_baiviet1=tblbaiviet::where('iddanhmucbaiviet',1)->orderBy('idbaiviet','desc')->first();
		$new_baiviet=tblbaiviet::where('iddanhmucbaiviet',1)->orderBy('idbaiviet','desc')->offset(1)->limit(4)->get();
		$event_baiviet1=tblbaiviet::where('iddanhmucbaiviet',2)->orderBy('idbaiviet','desc')->first();
		$event_baiviet=tblbaiviet::where('iddanhmucbaiviet',2)->orderBy('idbaiviet','desc')->offset(1)->limit(4)->get();
		$huongdan_baiviet1=tblbaiviet::where('iddanhmucbaiviet',3)->orderBy('idbaiviet','desc')->first();
		$huongdan_baiviet=tblbaiviet::where('iddanhmucbaiviet',3)->orderBy('idbaiviet','desc')->offset(1)->limit(4)->get();
		//$tintheo_id=tblbaiviet::where('iddanhmucbaiviet',$id)->get();		
		/*dd($huongdan_baiviet1);
        exit;*/
		return view('pages.index',compact('new_baiviet','new_baiviet1','event_baiviet','event_baiviet1','huongdan_baiviet','huongdan_baiviet1'));
	}
	public function getList($id)
	{
		$new_baiviet=tblbaiviet::where('iddanhmucbaiviet',$id)->orderBY('idbaiviet','desc')->paginate(4);
		$dm_baiviet=tbldanhmucbaiviet::where('iddanhmucbaiviet',$id)->get();
		return view('pages.list-new',compact('new_baiviet','dm_baiviet'));
	}
	public function getContent($id)
	{
		$baiviet=tblbaiviet::all()->where('idbaiviet',$id);
		//$danhmuc=tbldanhmucbaiviet::where('iddanhmucbaiviet',$id)->get();
		$danhmuc=tblbaiviet::join('tbldanhmucbaiviet','tbldanhmucbaiviet.iddanhmucbaiviet','=','tblbaiviet.iddanhmucbaiviet')->where('tblbaiviet.idbaiviet',$id)->distinct('tbldanhmucbaiviet.iddanhmucbaiviet','tbldanhmucbaiviet.tendanhmuc')->get();
		//$tinkhac=tblbaiviet::where(['idbaiviet','<>',$id],[''])->orderBy('idbaiviet','desc')->limit(4)->get();
		$tinkhac=tblbaiviet::where('tblbaiviet.idbaiviet','<>',$id)->join('tbldanhmucbaiviet','tbldanhmucbaiviet.iddanhmucbaiviet','=','tblbaiviet.iddanhmucbaiviet')->limit(4)->distinct('tblbaiviet.idbaiviet','tblbaiviet.title','tblbaiviet.ngaydang')->get();
		//return view('pages.index',['baiviet'=>$baiviet]);
		return view('pages.content',compact('baiviet','danhmuc','tinkhac'));
	}
	public function captcha()
	{
		return view('captcha');
	}

	public function getDangnhap()
	{
        if(Session::has('taikhoan'))
        {
            if(Cookie::get('taikhoan')==null)
                return redirect()->route('trangchu');
            else{
            dd('Chưa set cookie');
            exit;}
        }
        else
        {
		    return view('pages.dangnhap');
        }
    }

	public function getDangky()
	{
		return view('pages.dangky');
	}
	
	public function postDangky(Request $req)
	{
		$this->validate($req,[
			'taikhoan'=>'unique:users,taikhoan',
			'matkhau'=>'min:6|max:20',
            'matkhaure'=>'same:matkhau',
            //'email'=>'unique:users,email',
			'CaptchaCode'=>'required|valid_captcha'
		],
		[
			//'taikhoan.required'=>'Vui lòng nhập tài khoản'.
			'taikhoan.unique'=>'Tài khoản đã có người sử dụng',
			'matkhau.min'=>'Mật khẩu phải nhiều hơn 6 ký tự',
			'matkhau.max'=>'Mật khẩu phải ít hơn 20 ký tự',
            'matkhaure.same'=>'Mật khẩu không giống nhau',
            //'email.unique'=>'Email đã được sử dụng',
			'valid_captcha'=>'Sai mã captcha, xin nhập lại'
		]);
		$user= new tbluser();
		$user->taikhoan= $req->taikhoan;
        $user->password= Hash::make($req->matkhau);//mã hóa, tương tự md5
        $user->email=$req->email;
        //get token
        $user->remember_token=csrf_token();
        $user->save();
        Mail::send('pages.send_email',['nguoidung'=>$user], function($message) use ($user)
        {
            $message->from('lpdat2796@gmail.com','Admin');
            $message->to($user->email,$user->taikhoan);
            $message->subject('Xác nhận tài khoản');
        });
        
		return redirect()->back()->with('thongbao','Đã tạo tài khoản thành công. Kiểm tra mail để kích hoạt');//back() trờ lại trang trước đó, with là 																			thông báo

    }
    
    public function activeUser($id,$token){
        $user=tbluser::where([
                            ['iduser','=',$id],
                            ['remember_token','=',$token]                
                        ])->first();
            //$user=tbluser::where('iduser',$id)->first();
            if($user){
                $user->active=1;
                $user->save();
                return redirect()->route('dangky')->with('thanhcong','Đã kích hoạt tài khoản');
            }
    }
    public function setCookie(Request $req)
    {
        $minutes = 1;
  
        $response = new Response($req->iduser);
  
        $response->withCookie(cookie('cookie'.$req->taikhoan, $req->taikhoan, $minutes));
  
        return $response;
  
     } 
     public function getCookie(Request $req){


        $minutes = 1;
  
        $response = new Response($req->iduser);
  
        $response->withCookie(cookie('cookie'.$req->taikhoan, $req->taikhoan, $minutes));
  
        return $response;
  
     }

	public function postDangnhap(Request $req)
	{
        if(Session::has('taikhoan'))
        {
            
        }
        else
        {
                
            $credentials=array('taikhoan'=>$req->taikhoan,'password'=>/* Hash::make($req->matkhau) */$req->matkhau);
            if(Auth::attempt($credentials))
            {
                Session::put('taikhoan',$req->taikhoan,1);
                $minutes = 1;
                /* $response = new Response($req->iduser);
  
                 $response->withCookie(cookie('cookie'.$req->taikhoan, $req->taikhoan, $minutes)); */
                /* $value=$req->cookie('cookie'.$req->taikhoan);
                dd($value);
                exit; */
               /*  $user=Cookie::make($req->taikhoan, $req->taikhoan, 1);
                $a=Cookie::get($user);
                dd($a);
                exit; */
                return redirect()->route('trangchu')->withCookie(cookie('cookie'.$req->taikhoan, $req->taikhoan,$minutes));
            }
            else
            {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu không đúng']);
                
            }
            
            
        }
    }
    public function postDangnhap_index(Request $req)
	{
        if(Auth::check())
        {

        }
        else
        {
                
            $credentials=array('taikhoan'=>$req->taikhoan,'password'=>/* Hash::make($req->matkhau) */$req->matkhau,'active'=>1);
           
            Debugbar::info($req->taikhoan);
            Debugbar::info($req->matkhau);
            if(Auth::attempt($credentials))
            {
                Session::put('taikhoan',$req->taikhoan);
                return redirect()->route('trangchu')->withCookie(cookie('taikhoan', $req->taikhoan, 60));
            }
            else
            {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Sai thông tin đăng nhập']);
                
            }
        }
    }
    public function getLogout() {
        Session::forget('taikhoan');
        return redirect()->route('trangchu');
     }
     

    

    public function __construct() {
        //$this->middleware('auth');
        
    }

    public function getIndex_dn() {
    	return 'Đăng nhập thành công!';
    }

    public function getquenmatkhau()
    {
        return view('pages.quenmatkhau');
    }

    public function postquenmatkhau(Request $req)
    {
        //$this->validate($req,['CaptchaCode'=>'required|valid_captcha'],['valid_captcha'=>'Sải mã captcha, xin nhập lại']);
        $taikhoan=$req->taikhoan;
        $email=$req->email;
        $checkUser=tbluser::where('taikhoan',$taikhoan)->where('email',$email)->first();
        if(!$checkUser)
        {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Sai thông tin đăng nhập']);
        }
        $code=bcrypt(md5(time().$email));
        $checkUser->code=$code;
        $checkUser->time_code=Carbon::now();
        $checkUser->save();
        $url=route('resetmatkhau',['code'=>$checkUser->code]/* ,'email'=>$email] */);
        $data=[
            'route'=>$url
        ];
        Mail::send('send_email',/* ['nguoidung'=>$checkUser] */$data,function($message) use($checkUser)
        {
            $message->from('lpdat2796@gmail.com','Admin');
            $message->to($checkUser->email,$checkUser->taikhoan)->subject('Reset lại mật khẩu');
        });
        return redirect()->back()->with(['flag'=>'success','message'=>'Hãy vào email để lấy link reset mật khẩu']);
    }

    public function getReset(Request $req)
    {
        
        $code=$req->code;
        //$email=$req->email;
        $checkUser=tbluser::where(['code'=>$code/* ,'email'=>$email */])->first();
        if(!$checkUser)
        {
            return redirect()->route('dangnhap')->with(['flag'=>'danger','message'=>'Xin lỗi! Đường dẫn link này không đúng, bạn vui lòng thử lại sau.']);
        }
        
        return view('pages.resetpassword')/* ->with(['code'=>$req->code,$email]) */;
        
    }

    public function postReset( RequestResetPassword $requestResetPassword)
    {
        if($requestResetPassword->matkhau)
        {

            //$taikhoan=$requestResetPassword->taikhoan;
            $code=$requestResetPassword->Input('code');
            //$email=$requestResetPassword->email;
            $checkUser= tbluser::where([
                'code'=>$code,/* 
                'email'=>$email, */
            ])->first();
            if(!$checkUser)
            {
                return redirect()->route('dangnhap')->with(['flag'=>'danger','message'=>'Xin lỗi! Đường dẫn link này không đúng, bạn vui lòng thử lại sau.']);
            } 
            $checkUser->password=Hash::make($requestResetPassword->matkhau);
            $checkUser->save();
            return redirect()->route('dangnhap')->with(['flag'=>'success','message'=>'Đã đổi mật khẩu thành công, mời bạn đăng nhập']);
    
        }
    }

    //FACEBOOK Login
   /*  public function redirectToProvider($providers)
    {
        return Socialite::driver($porviders)->redirect();
    }

    public function handleProviderCallback($providers){
        try{
            $socialUser = Socialite::driver($providers)->user();
            //return $user->getEmail();
        }
        catch(\Exception $e){
            return redirect()->route('trangchu')->with(['flash_level'=>'danger','flash_message'=>'Đăng nhập không thành công']);
        }
        $socialProvider=SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider){
            //tạo mới
            $user=tbluser::where('email',$socialUser->getEmail())->first();
            if($user){
                return redirect()->route('trangchu')->with(['flash_level'=>'danger','flash_message'=>'Email đã có người sử dụng']);
            }
            else{
                $user= new tbluser();
                $user->email=$socialUser->getEmail();
                $user->taikhoan=$socialUser->getName();
                //if($providers='google'){
                    //$image=explode('?',$socialUser->getAvatar());
                    //$user->avatar=$image[0];
                //}
                //$user->avatar=$socialUser->getAvatar();
                $user->save();
            }
            $provider=new SocialProvider();
            $provider->provider_id=$socialUser->getId();
            $provider->provider=$providers;
            $provider->email=$socialUser->getEmail();
            $provider->save();
        }
        else{
            $user=tbluser::where('email',$socialUser->getEmail())->first();
        }
        Auth()->login($user);
        return redirect()->route('trangchu')->with(['flash_level'=>'success','flash_message'=>'Đăng nhập thành công']);
    }
    
    public function sendmail()
    {
        $data=array();
        $send= Mail::send('send_email',$data, function($message)
        {
            $message->to('lpdat2796@gmail.com')->subject('Test Mail');
            $message->from('lpdat2796@gmail.com');
        });
        //if(!$send ) dd('something wrong');
        echo 'Sended';
    } */
    /* public function redirect()
    {
    return Socialite::driver('facebook')->redirect();
    } */
    /**
    * Return a callback method from facebook api.
    *
    * @return callback URL from facebook
    */
    /* public function callback()
    {
    $userSocial = Socialite::driver('facebook')->user();
    //return $userSocial;
    $finduser = User::where('provider_id', $userSocial->id)->first();
    if($finduser){
        Auth::login($finduser);
        return Redirect::to('/');
    }else{
    $new_user = tbluser::create([
            'taikhoan'      => $userSocial->name,
            'email'      => $userSocial->email,
            //'image'  => $userSocial->avatar_original,
            'provider_id'=> $userSocial->id
        ]);
        Auth::login($new_user);
        return redirect()->back();
    } */
    /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
  public function redirect()
  {
      return Socialite::driver('facebook')->redirect();
  }

  /**
   * Return a callback method from facebook api.
   *
   * @return callback URL from facebook
   */
  public function callback(SocialFacebookAccountService $service)
  {
      $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
      auth()->login($user);
      return redirect()->route('trangchu');
  }

}
