<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =  Auth::user();
        $data = array();

        //code is commented due to redis serer. But settings are done for redis server

            // if(\Cache::has('wheather_'.$user->id)){
            //     $data = \Cache::get('wheather_'.$user->id);
            // }else{

            //     $service = new WeatherService();
            //     $result = $service->getData($user);
                    
            //         if($result->status == '200'){
            //             $data = json_decode($result->content)->main;
            //         }
            //         \Cache::put('wheather_'.$user->id, $data, 1440);// 1 day
            // }

        if($user->lat && $user->long){
            $service = new WeatherService();
            $result = $service->getData($user);
                
            if($result->status == '200'){
                $data = json_decode($result->content)->main;
                $newArr['user'] = $user->toArray();
                $newArr['main'] = $data;
                echo "<pre>";print_r($newArr);die;
            }
        }
            
        
        return view('home')->with('data',$data);
    }


    /**
     * Process the input lat long and fetch the wheather data.
     *
     * @redirect to home
     */
    public function location(Request $request)
    {
        $saveUser = User::where('id',  Auth::user()->id)->update([
                    'lat'   => $request->lat,
                    'long'  => $request->long,
        ]);
        return redirect('home'); 

    }
}
