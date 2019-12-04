<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use App\Models\Quizzes;
use Illuminate\Http\Request;



class TagController extends Controller
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
    

    public function tags() {
        $tagsList= Tags::all();
        
        return view('tagsList', [
            'tagsList' => $tagsList,            

        ]);
    }
    public function quiz(Request $request, $id) {
        $tags= Tags::find($id);
        $quizzesByTag=$tags->quizzes;    

            
        
    
    //dump($quizzesByTag);

     //dump($request);
        

        //dump($tags->quizzes);

        return view('quizzesByTag', [
            "tags" => $tags,
            "quizzesByTag"=>$quizzesByTag,
            
                     

        ]);
    }


}
