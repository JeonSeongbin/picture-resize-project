<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class Complete extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware('auth');
    }

    public function initialize(Request $request){
        $fileName = $request->input('filename');
    	return view("auth.complete",compact('fileName'));
    }

    public function download(Request $request){
        $filename = $request->input("filename");

        $pathToFile = "./savedPicture/".$filename;
        return response()->download($pathToFile,"renewaled_Picture.jpg");
    }

   // public function viewPicture(Request $request){
        
   // }

  //  public function backbutton(Request $request){

  //  }
}


?>
