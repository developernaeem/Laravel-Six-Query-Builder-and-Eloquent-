<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller {
    
    public function writePost() {
    	$category = DB::table('categories')->get();
    	return view('posts.write_post', compact('category'));
    }
	
	/* Post Insert to Database */
    public function storePost(Request $request) {
    	$validatedData = $request->validate([
            'title' => 'required||max:200',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG,JPEG,JPG | max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
        	$image_name = hexdec(uniqid());
        	$ext = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = 'assets/img/post/';
        	$image_url = $upload_path.$image_full_name;
        	$success = $image->move($upload_path,$image_full_name);
        	$data['image'] = $image_url;
        	DB::table('posts')->insert($data);
        	$notification = array(
				'message'=>'Successfully Post Inserted',
				'alert-type'=>'success'
    		);
    		return Redirect()->route('all_post')->with($notification);
        }else{
        	DB::table('posts')->insert($data);
        	$notification = array(
				'message'=>'Successfully Post Inserted',
				'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
        }
    }

    /* All Post Show */
    public function allPost() {
    	$post = DB::table('posts')
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->select('posts.*', 'categories.name')->get();
    	return view('posts.all_post', compact('post'));
    }

    /* View Post */

    /* Show Post data without category name */
/*    public function viewPost($id) {
        $post = DB::table('posts')->where('id',$id)->first();
        return view('posts.view_post', compact('post'));
    }*/

    /* Show Post data with Category Name */
    public function viewPost($id) {
        $post = DB::table('posts')
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->select('posts.*', 'categories.name')
                    ->where('posts.id', $id)->first();
        return view('posts.view_post', compact('post'));
    }

    /* Delete Post data with image  */
    public function deletePost($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;
        $delete = DB::table('posts')->where('id', $id)->delete();
        if ($delete) {
            unlink($image);
            $notification = array(
                'message'=>'Successfully Post Deleted',
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

    /* Edit Post data */
    public function editPost($id) {
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit_post', compact('category', 'post'));
    }

    /* Update post with Image */
    public function updatePost(Request $request, $id) {
        $validatedData = $request->validate([
            'title' => 'required||max:200',
            'details' => 'required',
            'image' => 'mimes:jpeg,jpg,png,PNG,JPEG,JPG | max:1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'assets/img/post/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;

            /* Image update code here */
            unlink($request->oldImage);
            DB::table('posts')->where('id', $id)->update($data);
            $notification = array(
                'message'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all_post')->with($notification);
        }else{
            $data['image'] = $request->oldImage;
            DB::table('posts')->where('id', $id)->update($data);
            $notification = array(
                'message'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all_post')->with($notification);
        }
    }
}
