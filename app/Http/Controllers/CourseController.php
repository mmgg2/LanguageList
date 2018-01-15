<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;


/** 
* Controller for Crud courses
* @author Maximiliano Garbate 
*/
class CourseController extends Controller
{
     
	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$courses = Course::where('description', 'LIKE', '%'.$request->search.'%')->paginate(5);
		//$courses = Course::orderBy('id','DESC')->paginate(2);
		
		if($courses->count() > 0){
			return view('courses.index',compact('courses'))
				->with('i', ($request->input('page', 1) - 1) * 2);
		}
		else{
			Session::flash('message', 'Course not found!');
			return view('courses.index',compact('courses'))
			->with('i', ($request->input('page', 1) - 1) * 2);
		}
	}


    
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('courses.create');
    }
    
    
   
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
            'code' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        
        
		$destination =  public_path(). '/uploads/';
		$image       = $request->file('image');
		$filename    = $image->getClientOriginalName(); // get the filename
		$image->move($destination, $filename); // move file to destination


		Course::create([
		'code' => $request->code,
		'description' => $request->description,
		'price' => $request->price,
		'image' => '/uploads/'.$filename,
		]);

        //Course::create($request->all());
		Session::flash('message', 'Successfully created course!');
		return Redirect::to('courses');
            
    }
    
    

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
        $_find_course = Course::find($id);

        // show the view and pass the nerd to it
        return View::make('courses.show')
            ->with('course', $_find_course);
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the nerd
         $_find_course = Course::find($id);

        // show the edit form and pass the nerd
        return View::make('courses.edit')
            ->with('course',  $_find_course);
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
        $this->validate($request, [
            'code' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        
        $destination =  public_path(). '/uploads/';
		$image       = $request->file('image');
		$filename    = $image->getClientOriginalName(); // get the filename
		$image->move($destination, $filename); // move file to destination


		Course::find($id)->update([
		'code' => $request->code,
		'description' => $request->description,
		'price' => $request->price,
		'image' => '/uploads/'.$filename,
		]);

        //Course::find($id)->update($request->all());
      
		Session::flash('message', 'Successfully updated course!');
		return Redirect::to('courses');
                        
                        
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
          // redirect
        Session::flash('message', 'Successfully deleted course!');
        return Redirect::to('courses');
    }
}

