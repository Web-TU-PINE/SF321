<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Department;
use App\TypeBook;
use Image;
use File;

class ManageBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::all()->toArray();
      return view('findbook', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createBook');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $book = $this->validate(request(), [
            'booknumber' => 'required|numeric',
            'heading' => 'required',
            'detail' => 'required',
            'file' => 'required',
            'refer' => 'required',
            'speed' => 'required',
            'fromdpm' => 'required',
            'todpm' => 'required',
            'typebook' => 'required',
            'start' => 'required',
            'end' => 'required',
          ]);
          $book = new Book();

          //upload file
          if($request->hasFile('file')){
            $newfilename = str_random(10).'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path().'/images/',$newfilename);
            // Image::make(public_path().'/images/'.$newfilename)->resize(50,50)->save(public_path().'/images_resize/'.$newfilename);

            $book->file = $newfilename;
            $book->booknumber = $request->booknumber;
            $book->heading = $request->heading;
            $book->detail = $request->detail;
            $book->refer = $request->refer;
            $book->speed = $request->speed;
            $book->fromdpm = $request->fromdpm;
            $book->todpm = $request->todpm;
            $book->typebook = $request->typebook;
            $book->start = $request->start;
            $book->end = $request->end;

      }
          $book->save();

          return back()->with('success', 'book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $book = Book::find($id);
          $typeSelect = TypeBook::find($book->typebook);
          $types = TypeBook::all();
          $drps = Department::all();
          return view('edit',compact('book','id','typeSelect','types','drps'));
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
             $book = Book::find($id);
             $this->validate(request(), [
               'booknumber' => 'required|numeric',
               'heading' => 'required',
               'detail' => 'required',
               'refer' => 'required',
               'speed' => 'required',
           ]);
           $book->booknumber = $request->get('booknumber');
           $book->heading = $request->get('heading');
           $book->detail = $request->get('detail');
           $book->refer = $request->get('refer');
           $book->speed = $request->get('speed');
           $book->save();
           return redirect('welcome')->with('success','book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $book = Book::find($id);
         $book->delete();
         return redirect('book')->with('success','Product has been  deleted');
    }



    public function find(Request $request)
         {
             $booknumber=$request->booknumber;
             $heading=$request->heading;



             $book = Book::where('booknumber', 'like', '%' . $booknumber . '%')
                    ->orWhere('heading', 'like', '%' . $heading . '%')
                    ->select('id','booknumber','heading')
                    ->get();


             return view('search-users',compact('book'));


         }
}
