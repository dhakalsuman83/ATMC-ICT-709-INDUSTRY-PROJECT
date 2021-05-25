<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendingEmail;
use Illuminate\Http\Request;
use App\Models\Student;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::select('select * from students');
return view('student',['student'=>$student]);


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
        $student = new Student;
        $student->fname=$request->fname;
        $student->mname=$request->mname;
        $student->lname=$request->lname;
        $student->address=$request->address;
        $student->enrollID=$request->enrollID;
        $student->s_course=$request->s_course;
        $student->dob=$request->dob;
        $student->contact=$request->contact;
        $student->email=$request->email;
        $student->password=md5($request->password);
        $student->ename=$request->ename;
        $student->econtact=$request->econtact;
        $student->role=$request->role;
        $student->save();
        


/***email code starts */

        $data = array(
            'fname' => $request->fname,
            'message' => $request->fname
        );
        try

        {
        Mail::to($student)->send(new sendingEmail($data));
        return back()->with('success', 'Thanks for contacting us!');
    return redirect('/student')->with('status', 'User registered successfully!!!!');
        }
 
            // Validate the value...
    catch (Throwable $e) {
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::select('select * from students where sid = ?',[$id]);
return view('edituser',['student'=>$student]);
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
public function view($id)
{
    $student = DB::select('select * from students where sid = ?',[$id]);
return view('studentview',['student'=>$student]);


/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
}
    public function edit($id)
    {

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

        $data= Student::find($id);
        $data->fname=$request->fname;
        $data->mname=$request->mname;
        $data->lname=$request->lname;
        $data->enrollId=$request->enrollID;
        $data->s_course=$request->s_course;
        $data->dob=$request->dob;
        $data->contact=$request->contact;
        $data->email=$request->email;
        $data->ename=$request->ename;
        $data->econtact=$request->econtact;
        $data->save();


        return redirect('/student')->with('status', 'User updated successfully!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from students where sid = ?',[$id]);
      return redirect('/student')->with('status', 'User Deleted successfully!');
    }

    public function changepass(Request $request,$id)
    {
        $data= Student::find($id);
        $data->password=md5($request->password);
        $data->save();
        return redirect('/student')->with('status', 'Password Updated successfully!!!!');
    }

}
