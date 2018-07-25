<?php

namespace App\Http\Controllers;

use App\Storescategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorescategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if( Auth::check() ){

        $storescategories = Storescategory::simplePaginate(7);         
        return view('storescategories.index', ['storescategories'=> $storescategories]);

        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('storescategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storescategories = Storescategory::all();  

        if(Auth::check()){
            $storescategory = Storescategory::create([
                'CategoryName' => $request->input('CategoryName'),
                'Notes' => $request->input('Notes'),
                'UpdatedBy' => Auth::user()->UserName
            ]);

            if($storescategory){
                return redirect()->route('storescategories.index', ['storescategories'=> $storescategories])
                ->with('status' , 'Category created successfully');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Storescategory  $storescategory
     * @return \Illuminate\Http\Response
     */
    public function show(Storescategory $storescategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Storescategory  $storescategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Storescategory $storescategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Storescategory  $storescategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storescategory $storescategory)
    {
        //
        $storescategories = Storescategory::all(); 

        $storescategoryUpdate = Storescategory::where('CategoryID', $storescategory->CategoryID)
                                ->update([
                                        'CategoryName'=> $request->input('CategoryName'),
                                        'Notes'=> $request->input('Notes')
                                ]);
      if($storescategoryUpdate){
        return redirect()->route('storescategories.index', ['storescategories'=> $storescategories])
        ->with('status' , 'Category Updated successfully');
      }
      //redirect
      return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Storescategory  $storescategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storescategory $storescategory)
    {
        //
        $storescategories = Storescategory::all();  

        $findStorescategory = Storescategory::find( $storescategory->CategoryID);
		if($findStorescategory->delete()){
            
            //redirect
            return redirect()->route('storescategories.index', ['storescategories'=> $storescategories])
            ->with('status' , 'Category deleted successfully');
        }
         return back()->withInput()->with('error' , 'Company could not be deleted');
    }
}
