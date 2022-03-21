<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\User;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $blog = Blog::all();
        $totalBlog = count(Blog::all());
        $unpublishedBlog = count(Blog::where('blog_status',0)->get());
        $publishedBlog = $totalBlog - $unpublishedBlog;
        return view('admin.blogs.index')->with('blog', $blog)->with('totalBlog', $totalBlog)->with('unpublishedBlog', $unpublishedBlog)->with('publishedBlog', $publishedBlog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = Blog::all();
        $totalBlog = count(Blog::all());
        $unpublishedBlog = count(Blog::where('blog_status',0)->get());
        $publishedBlog = $totalBlog - $unpublishedBlog;
        return view('admin.blogs.create')->with('blog', $blog)->with('totalBlog', $totalBlog)->with('unpublishedBlog', $unpublishedBlog)->with('publishedBlog', $publishedBlog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'blog_title' => 'required',
            'blog_body' => 'required|',

        ]);



        $blog = new Blog();
        $blog->blog_title = $request->input('blog_title');
        $blog->blog_body = $request->input('blog_body');
        $blog->user_id = auth()->user()->id;

        $slug_item = $request->input('blog_title');
        $slug_item = strtolower($slug_item);
        $res_slug_item = str_replace(" ", "-", $slug_item);

        // dd($res_slug_item);

        $blog->slug = $res_slug_item;

        $blog->save();

        return redirect(route('admin.blogs.index'))->with('success', 'Successfully added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $totalBlog = count(Blog::all());
        $unpublishedBlog = count(Blog::where('blog_status',0)->get());
        $publishedBlog = $totalBlog - $unpublishedBlog;

        //Check for correct user
        if (auth()->user()->id !== $blog->user_id){
            return back()->with('error', 'Unauthorized Page.');
        }
        else{
        return view('admin.blogs.edit')->with('blog', $blog)->with('totalBlog', $totalBlog)->with('unpublishedBlog', $unpublishedBlog)->with('publishedBlog', $publishedBlog);
        }
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
        $this->validate($request,[
            'blog_title' => 'required',
            'blog_body' => 'required|',

        ]);



        $blog = Blog::find($id);
        $blog->blog_title = $request->input('blog_title');
        $blog->blog_body = $request->input('blog_body');
        $blog->user_id = auth()->user()->id;
        $blog->blog_status = 0;
        $blog->publish_status = 0;

        $slug_item = $request->input('blog_title');
        $slug_item = strtolower($slug_item);
        $res_slug_item = str_replace(" ", "-", $slug_item);
        $blog->slug = $res_slug_item;

        $blog->save();
        return redirect(route('admin.blogs.index'))->with('success', 'Successfully updated.');

        // return view('admin.blogs.index')->with('success', 'Blog has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return back()->with('success', 'Item has been deleted successfully');
    }

    public function blogList()
    {
        $blogList = Blog::all();
        $totalBlogs = \count(Blog::all());
        return view('admin.blogs.blogList')->with('blogList', $blogList)->with('totalBlogs', $totalBlogs);
    }
}
