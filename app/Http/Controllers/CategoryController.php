<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
   
    public function index(Request $request)
    {   
        $q=$request->q;
        // $data=Category::all();
    	$Category=Category::where('title','like','%'.$q.'%')->get();
  
        return view('category.indexCategory',[
            'data'=>$Category,
            'Category'=>$Category,
            'title'=>'All Categories',
            'meta_desc'=>'This is meta description for all categories'
        ]);
    }

    /**
     * Create
     */
    public function create()
    {
        return view('category.addCategory');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage='na';
        }

        $category=new Category;
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('category/create')->with('success','Data has been added');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('category.updateCategory',['data'=>$data]);
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->cat_image;
        }

        $category=Category::find($id);
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('category/'.$id.'/edit')->with('success','Data has been added');
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect('category/');
    }
}
