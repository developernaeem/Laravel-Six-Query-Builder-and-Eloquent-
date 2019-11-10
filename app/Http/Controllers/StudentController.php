<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller {

    /* Show all Data */
    public function index() {
		$student = Student::all();
		return view('student.all_student', compact('student'));
    }
	
	/* Create Student */
    public function create() {
    	return view('student.create');
    }
	
	/* Insert Data */
    public function store(Request $request) {
    	$validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'phone' => 'required||unique:students|max:15|min:9',
            'email' => 'required|unique:students',
        ]);

		$student = new Student;
		$student->name = $request->name;
		$student->phone = $request->phone;
		$student->email = $request->email;
		$student->save();
		$notification = array(
			'message'=>'Successfully Student Inserted',
			'alert-type'=>'success'
		);
		return Redirect()->back()->with($notification);
    }
	
	/* view Data */
    public function show($id) {
		$student = Student::findorfail($id);
		return view('student.view_student', compact('student'));
    }

    /* Edit Student */
    public function edit($id) {
    	$student = Student::findorfail($id);
    	return view('student.edit_student', compact('student'));
    }

    /* Update Student */
    public function update(Request $request, $id) {
    	$student = Student::findorfail($id);
    	$student->name = $request->name;
		$student->email = $request->email;
		$student->phone = $request->phone;
		$student->save();
		$notification = array(
			'message'=>'Successfully Student Updated',
			'alert-type'=>'success'
		);
		return Redirect()->route('all_student')->with($notification);
    }

    /* Delete Student */
    public function destroy($id) {
    	$student = Student::findorfail($id);
    	$student->delete();
    	$notification = array(
			'message'=>'Successfully Student Deleted',
			'alert-type'=>'success'
		);
		return Redirect()->back()->with($notification);
    }
}
 