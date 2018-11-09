<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;

class Userscontroller extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function RegisterForm(){

        return view('register_form');
    } 

     public function Administrator(){

        return view('admin_register_form');
    } 

    public function CourseRegister(){

        return view('course_register');
    } 
    public function StudentInfos(Request $request){
        $userId = Auth::user()->id;
        $level = $request->input('level');

        $check = DB::table('studentinfos')->where('student_id',$userId)->where('level',$level)->first(); 
        if ($check) {
            $request->session()->flash('status', 'Already Exist.');

        return redirect()->route('home');
        }

        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d');
        
        DB::table('studentinfos')->insert($data);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('home');
    }
      public function Regdetail(){
        $userId = Auth::user()->id;
       

        $list = DB::table('studentinfos')->where('student_id',$userId)->get();

        return view('reg_detail',['list'=>$list]);
    }

    public function AdvisorReview(){
        $userId = Auth::user()->id;
        $students = DB::table('users')->where('group_id',5)->where('advisor_id',$userId)->get();
        $ids = array();
        foreach ($students as $row) {
            $ids[] = $row->id;
        }

        $list = DB::table('studentinfos')->where('status',0)->whereIn('student_id',$ids)->get();

        return view('advisor_review',['list'=>$list]);
    }
     public function AdvisorAccept($id,Request $request){
        $input = array(
            'status' => 1,
            'updated_at' => date('Y-m-d')
        );

        $list = DB::table('studentinfos')->where('id',$id)->update($input);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('advisor_review');
    }
    public function ProvostReview(){
         $userId = Auth::user()->id;
        $students = DB::table('users')->where('group_id',5)->where('provost_id',$userId)->get();
        $ids = array();
        foreach ($students as $row) {
            $ids[] = $row->id;
        }

        $list = DB::table('studentinfos')->where('status',1)->whereIn('student_id',$ids)->get();

        return view('provost_review',['list'=>$list]);
    }
    public function ProvostAccept($id,Request $request){

        $input = array(
            'status' => 2,
            'updated_at' => date('Y-m-d')
        );

        $list = DB::table('studentinfos')->where('id',$id)->update($input);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('provost_review');
    }
    public function HeadReview(){
        $userId = Auth::user()->id;
        $students = DB::table('users')->where('group_id',5)->where('head_id',$userId)->get();
        $ids = array();
        foreach ($students as $row) {
            $ids[] = $row->id;
        }

        $list = DB::table('studentinfos')->where('status',2)->whereIn('student_id',$ids)->get();

        return view('head_review',['list'=>$list]);
    }
    public function HeadAccept($id,Request $request){

        $input = array(
            'status' => 3,
            'updated_at' => date('Y-m-d')
        );
        
        $list = DB::table('studentinfos')->where('id',$id)->update($input);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('head_review');
    }

    public function UserRegister(Request $request){

    	$data = $request->except('_token','cpassword');
    	
    	DB::table('users')->insert($data);

    	$request->session()->flash('status', 'Task was successful!');

    	return redirect()->route('register_form');
    }
      public function AdministratorRegister(Request $request){

        $data = $request->except('_token','cpassword');
        
        DB::table('users')->insert($data);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('admin_register_form_fill');
    }
     
    
}
