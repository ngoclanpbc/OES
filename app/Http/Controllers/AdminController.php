<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;
class AdminController extends Controller
{
    //add subject
    public function addSubject(Request $request)
    {
        try{
            $subject= new Subject();
            $subject->subject = $request->subject;
            $subject->save();
            // Subject::insert([
            //     'subject' => $request->subject
            // ]);
            return response()->json(['success'=>true,'msg'=>'Subject added Successfully!']);
            
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        };

    }
    //edit subject
    public function editSubject(Request $request)
    {
        try{
            // $subject= new Subject();
            // $subject->subject = $request->subject;
            // $subject->save();
            // Subject::insert([
            //     'subject' => $request->subject
            // ]);
            $subject = Subject::where('id', $request->id)->first();
            $subject->subject = $request->subject;
            $subject->save();

            return response()->json(['success'=>true,'msg'=>'Subject updated Successfully!']);
            
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        };

    }

     //delete subject
     public function deleteSubject(Request $request)
     {
         try{
            
            Subject::where('id', $request->id)->delete();
             
              return response()->json(['success'=>true,'msg'=>'Subject deleted  Successfully!']);
             
         }catch(\Exception $e){
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
         };
 
     }

     //exam dashboard load
     public function examDashboard()
     {
        $subjects = Subject::all();
        return view('admin.exam-dashboard',['subjects'=>$subjects]);
     }
     //add exam
     public function addExam(Request $request)
     {
        try{
            
            $exam= new Exam();
            $exam->exam_name = $request->exam_name;
            $exam->subject_id = $request->subject_id;
            $exam->date = $request->date;
            $exam->time = $request->time;
            $exam->save();
             
              return response()->json(['success'=>true,'msg'=>'Exam added  Successfully!']);
             
         }catch(\Exception $e){
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
         };
     }
}
