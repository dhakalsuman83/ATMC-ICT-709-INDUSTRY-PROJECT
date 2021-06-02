<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use Session;
use Illuminate\Support\Facades\Mail;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $book = DB::select('select * from books');
        return view('booking',['book'=>$book]);
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
    public function store(Request $request, $rid)
    {
        
        $book = new Book;
        $book->sdate=$request->sdate;
        $book->edate=$request->edate;
        $book->r_id=$rid;
        $book->s_id= $request->sid;
        $book->fname= $request->fname;
        $book->mname= $request->mname;
        $book->lname= $request->lname;
        $book->eid= $request->eid;
        $book->rno= $request->rno;
        $book->bstatus=$request->bstatus;



        $book->save();

        /**email part */

       
        return redirect('/studenthome')->with('status', 'Room Booked successfully!!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = DB::select('select * from books where s_id = ?',[$id]);
return view('mybooking',['book'=>$book]);
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
        $data= Book::find($id);
        $data->sdate=$request->sdate;
        $data->edate=$request->edate;
        $data->save();

        return redirect('/booking')->with('status', 'Booking updated successfully!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::delete('delete from books where id = ?',[$id]);
          return redirect('/booking')->with('status', 'Booking Deleted successfully!');
        
    }
}
