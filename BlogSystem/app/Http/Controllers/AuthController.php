<?php

namespace App\Http\Controllers;

//use App\Models\Auth;
use Illuminate\Http\Request;
use App\UserStatus;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(Request $request)
    {
        $data = [
            'pageTitle'=>'Login',
        ];
        return view('back.pages.auth.login',$data);
    }

    public function forgotForm(Request $request)
    {
        $data = [
            'pageTitle'=>'Forgot Password'
        ];
        return view('back.pages.auth.forgot',$data);
    }

    public function loginHandler(Request $request){
      //   dd($request->all());
      $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        
      if($fieldType == 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ],[
                'login_id.required'=>'Enter Your Email or Username',
                'login_id.email'=>'Invalid Email address',
                'login_id.exists' => 'Invalid EmailID..!'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required|exists:users,name',
                'password' => 'required|min:5'
            ],[
                'login_id.required'=>'Enter Your Email or Username',
                'login_id.email'=>'Invalid Email address',
                'login_id.exists' => 'Invalid Username..!'
            ]);
        }

        $creds = array(
            $fieldType=>$request->login_id,
            'password'=>$request->password,
        );

        if( Auth::attempt($creds)){
            // check if account is inactive mode
            if(auth()->user()->status == UserStatus::Inactive ){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route(admin.login)->with('fail','Your Account is currently Inactive. Please, contact support at (support@larablog.test) for further assestent. ');
            }

           // check if account is in pending

            if(auth()->user()->status == UserStatus::Pending){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('fail','Your account is currently panding');


            }

            //Redirect use to Dashboard
            return redirect()->route('admin.dashboard');

        }else{
            return redirect()->route('admin.login')->withInput()->with('fail','Incurrect Password..!');
        }


    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
