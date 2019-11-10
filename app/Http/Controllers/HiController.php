<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HiController extends Controller {


    public function addCategory() {
    	return view('posts.add_category');
    }
    
    /* Data Insert To Database */
    public function storeCategory(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

		$data = array();
		$data['name'] = $request->name;
		$data['slug'] = $request->slug;
    	$category = DB::table('categories')->insert($data);
    	if ($category) {
    		$notification = array(
				'message'=>'Successfully Category Inserted',
				'alert-type'=>'success'
    		);
    		return Redirect()->route('all_category')->with($notification);
    	}else{
			$notification = array(
				'message'=>'Something went wrong!',
				'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }
    
    /* All Data Show */
    public function allCategory() {
        $category = DB::table('categories')->get();
        return view('posts.all_category', compact('category'));
    }

    /* View Data */
    public function viewCategory($id) {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.view_category', compact('category'));
    }

    /* Delete Data */
    public function deleteCategory($id) {
        $category = DB::table('categories')->where('id',$id)->delete();
        if ($category) {
            $notification = array(
                'message'=>'Successfully Category Delete',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /* Edit Data */
    public function editCategory($id) {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.edit_category', compact('category'));
    }

    /* Update Data */
    public function updateCategory(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);
        if ($category) {
            $notification = array(
                'message'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all_category')->with($notification);
        }else{
            $notification = array(
                'message'=>'Nothing to Updated!',
                'alert-type'=>'error'
            );
            return Redirect()->route('all_category')->with($notification);
        }
    }
}
