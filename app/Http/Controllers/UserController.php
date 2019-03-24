<?php
namespace App\Http\Controllers;
use Hash;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->password ===$request->confirmpassword)
        {
     
        request()->validate([

            'userimage' => 'required|image|mimes:jpeg|max:2048',
            'captcha' => 'required|captcha',
        ], ['captcha.captcha'=>'Invalid captcha code.',
          'userimage'=>'img should in  jpeg extention'
        ]);

        $imageName = time().'.'.request()->userimage->getClientOriginalExtension();
        request()->userimage->move(public_path('images'), $imageName);
        $registeruser = new User;
        $registeruser->fristname=$request->fristname;
        $registeruser->userimage=$imageName;
        $registeruser->lastname=$request->lastname;
        $registeruser->email=$request->email;
        $registeruser->adderss=$request->adderss;
        $registeruser->password= bcrypt($request->password);  
        $registeruser->country_id=$request->country_id;
        $registeruser->city_id=$request->city_id;
        $registeruser->save();
        return back()->with('success','You have successfully  Register.');
        }
        else{
            return back()->with('erorr','erorr in password or image sould be ex: img.jepg  .');
        }

    
       
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
