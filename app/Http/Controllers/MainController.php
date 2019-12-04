<?php

namespace App\Http\Controllers;
use App\Models\Quizzes;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\UrlGenerator;


class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function homeAction(Request $request)
    {

        $quizzes = Quizzes::all();
        //dump($request);
        
        
        //dump(app('request')->headers->get('referer'));
        
        
        
        //dump($quizzes[1]->title);
       
        return view('home', [
            'quizzes' => $quizzes,
            
            
           
        ]);

       
    }
}
