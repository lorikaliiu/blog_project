<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class PostController extends Controller
{
   
    public function index(Request $request)
    {
        $q=$request->q;
        $data=Post::where('title','like','%'.$q.'%')->get();
        // $data=Post::all();
        return view('post.indexPost',[
            'data'=>$data,
        ]);
    }

    /**
     * Create
     */
    public function create()
    {
        $cats=Category::all();
        return view('post.addPost',['cats'=>$cats]);
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

    
        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=0;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->save();

        return redirect('post/create')->with('success','Data has been added');
    }

    
    

    /**
     * Edit
     */
    public function edit($id)
    {
        $cats=Category::all();
        $data=Post::find($id);
        return view('post.updatePost',['cats'=>$cats,'data'=>$data]);
    }

    /**
     * Update 
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

      

        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage=$request->post_image;
        }

        $post=Post::find($id);
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->save();

        return redirect('post/'.$id.'/edit')->with('success','Data has been updated');
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('post');
    }
}
