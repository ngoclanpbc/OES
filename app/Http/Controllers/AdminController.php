<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
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
             // $subject= new Subject();
             // $subject->subject = $request->subject;
             // $subject->save();
             // Subject::insert([
             //     'subject' => $request->subject
             // ]);
             //console.log("1");
            Subject::where('id', $request->id)->delete();
             
              return response()->json(['success'=>true,'msg'=>'Subject deleted  Successfully!']);
             
         }catch(\Exception $e){
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
         };
 
     }
}
