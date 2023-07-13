<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\EditRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::withTrashed()->get();
        if(request()->ajax()) {
            return datatables()->of($post)
            ->addColumn('action', 'posts.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
            return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        $post = Post::createUpdate(new Post, $request);
        $message = 'Post added successfully!';
        return redirect('/posts')->with('info', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Post $post)
    {
        $data = $request->all();
        $posts = Post::createUpdate($post, $request);
        $message = 'Post updated successfully!';
        return redirect('/posts')->with('info', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function removeMultiPost(Request $request)
    {
        $ids = $request->ids;
        if(explode(",",$ids)){
            Post::whereIn('id',explode(",",$ids))->delete();
        }else{
            Post::whereIn('id',$ids)->delete();
        }
        return response()->json(['status'=>true,'message'=>"Student successfully removed."]);         
    }

    public function delete(Request $request, Post $post)
    {
        $data = $request->all();
        $post = Post::where('id',$data['post'])->first();
        $id = $data['post'];
        $filteredImages = array_filter($post->images, function ($img) use ($data) {
            return $img != $data['image'];
        });
        $commaSeparated[] = implode(',', $filteredImages);
        $post->images = $commaSeparated;
        $post->save();
    }
}
