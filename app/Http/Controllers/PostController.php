<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;  //relation to table

class PostController extends Controller
{
    public function myPosts()

    {

        return view('my-posts');

    }




    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
//get data from table
    public function index()

    {

        $posts = Post::latest()->paginate(5);

        return response()->json($posts);

    }




    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
//insert to table
    public function store(Request $request)

    {

        $post = Post::create($request->all());

        return response()->json($post);

    }




    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
//update
    public function update(Request $request, $id)

    {

        $post = Post::find($id)->update($request->all());

        return response()->json($post);

    }




    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
//delete data
    public function destroy($id)

    {

        Post::find($id)->delete();

        return response()->json(['done']);

    }
}
