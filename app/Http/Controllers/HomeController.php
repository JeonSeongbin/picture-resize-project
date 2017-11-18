<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function imageUpload(Request $request){
     //   dd($request->file("image"));
 

        //form check
/*
        $input = $request->all();

        $rules = [

            'image' => 'required|image|max:100000000'
        ];

        $validation = \Validator::make($input,$rules);

        if($validation->fails()){
            //var_dump($validation->errors());
          // exit;
            return redirect()->back()->withErrors($validation->errors()) ->withInput();
        }
*/

        //server check
        //file require check
        if(Input::hasFile("image")){

            //get file Name
            $fileName = $request->file('image')->getClientOriginalName();
    
            //Check the posted image file extention
            $extension = File::extension($fileName);
            if ( is_executable ($fileName )){
                
            }

            //exception error
            $extension = strtolower($extension);
            //대소문자 구분 할 것
            //php.ini 파일 수정해서 파일 사이즈 조절 할 것
            if(strcmp($extension,"jpg") != 0 &&
                strcmp($extension,"jpeg") != 0 &&
                strcmp($extension,"bmp") != 0 &&
                strcmp($extension,"gif" != 0) &&
                strcmp($extension,"png" != 0) &&
                strcmp($extension,"PNG" != 0)
             ){

                $error = ["extensionError" => " extension error ".$extension];
                return view("auth/login",compact("error"));
 
            }

            $image = $request->file("image");

            //file size check
            $size = File::size($image);
           // echo $size;

            if( 15000000000 < $size ){

                //size Error
                $error = ["sizeError" => "size Error ".$size ];
                return view("auth/login",compact("error"));

            }
        
        }else{

             //image not Found error
             $error= ["notFound" => "not Found Image File"];
             return view("auth/login",compact("error"));
        }


  
        $filename = uniqid().'.'.$extension; //$ext는 위에서 사용된 확장자 부분, 
        //$file


        //사진 저장 처리
        $request->file('image')->move("./savedPicture", $filename);

        //check end
        //go to second page
        return view("auth/register",compact("filename"));
    }

/*
    public static function file(){
        ::
    }

    public function file(){
        ->
    }
    */
}