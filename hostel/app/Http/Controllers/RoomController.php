<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Room;
/**use Intervention\Image\ImageManagerStatic as Image; */
use Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = DB::select('select * from rooms');
return view('room',['room'=>$room]);

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
        $room = new Room;
        $room->no=$request->no;
        $room->block=$request->block;
        $room->available=$request->available;
        $room->description=$request->desc;
        $room->price=$request->price;
        $image = $request->file('image');
        $temp_image2=$request->image2;
        
       $input['imagename'] = time().'.'.$image->extension();
        $destinationPath = public_path('/thumbnail');

        $img = Image::make($image->path());

        $img->resize(100, 100, function ($constraint) {

            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['imagename']);

   

        $destinationPath = public_path('/images');
        $request->image->move(public_path('images'), $input['imagename']);
        $room->image1=$input['imagename'];

         if($request->hasfile('image2'))
        {
            $image2 = $request->file('image2');

            $input['imagename2'] = time().rand(1,1000).'.'.$image2->extension();
            $destinationPath = public_path('/thumbnail');
    
            $img2 = Image::make($image2->path());
    
            $img2->resize(100, 100, function ($constraint) {
    
                $constraint->aspectRatio();
    
            })->save($destinationPath.'/'.$input['imagename2']);
    
       
    
            $destinationPath = public_path('/images');
            $request->image2->move(public_path('images'), $input['imagename2']);
            $room->image2=$input['imagename2'];
           
   
        }

       
    

        

        $room->save();

        return redirect('/room')->with('status', 'Room added successfully!!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $room = DB::select('select * from rooms where id = ?',[$id]);
return view('editroom',['room'=>$room]);


    }

    public function view($id)
{
    $room = DB::select('select * from rooms where id = ?',[$id]);
return view('viewroom',['room'=>$room]);


/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data= Room::find($id);
        $data->no=$request->no;
        $data->block=$request->block;
        $data->description=$request->desc;
        $data->price=$request->price;
        $image = $request->file('image');
        $temp_image2=$request->image2;
        
       $input['imagename'] = time().'.'.$image->extension();
        $destinationPath = public_path('/thumbnail');

        $img = Image::make($image->path());

        $img->resize(100, 100, function ($constraint) {

            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['imagename']);

   

        $destinationPath = public_path('/images');
        $request->image->move(public_path('images'), $input['imagename']);
        $data->image1=$input['imagename'];

         if($request->hasfile('image2'))
        {
            $image2 = $request->file('image2');

            $input['imagename2'] = time().rand(1,1000).'.'.$image2->extension();
            $destinationPath = public_path('/thumbnail');
    
            $img2 = Image::make($image2->path());
    
            $img2->resize(100, 100, function ($constraint) {
    
                $constraint->aspectRatio();
    
            })->save($destinationPath.'/'.$input['imagename2']);
    
       
    
            $destinationPath = public_path('/images');
            $request->image2->move(public_path('images'), $input['imagename2']);
            $data->image2=$input['imagename2'];
           
   
        }
        $data->save();


        return redirect('/room')->with('status', 'Room updated successfully!!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from rooms where id = ?',[$id]);
      return redirect('/room')->with('status', 'Room Deleted successfully!');
    }
}
