<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:120|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required'
        ]);

        $post = ( new Post( $request->all() ) )->save();

//        $post = new Post();
//        $post->title = $request['title'];
//        $post->author = $request['author'];
//        $post->body = $request['body'];
//        $post->save();
        return redirect()->route('admin.index')->with(['success' => 'Post Successfully created']);
    }
    public function getBlogIndex()
    {
        $posts = Post::paginate(5);
        foreach($posts as $post)
        {
            $post->body= $this->shortenText($post->body, 20);
        }
        return view('frontend.blog.index',['posts' => $posts]);
    }
    public function getCreatePost()
    {
        return view('admin.blog.create_post');
    }
    public function getPostIndex()
    {
        $posts = Post::paginate(5);
        return view('admin.blog.index',['posts' => $posts]);
    }
    public function getUpdatePostAction($post_id)
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        return view('admin.blog.edit_post',['post' => $post]);
    }
    public function getSinglePost($post_id, $end = 'frontend')
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        return view($end.'.blog.single',['post' => $post]);
    }
    public function postUpdatePost(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:120',
            'author' => 'required|max:80',
            'body' => 'required'
        ]);
        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();
        return redirect()->route('admin.index')->with(['success' => 'Post Successfully Updated']);
    }
    private function shortenText($text, $word_count)
    {
        if(str_word_count($text,0)>$word_count)
        {
            $words = str_word_count($text,2);
            $post = array_keys($words);
            $text = substr($text,0,$post[$word_count]). '...';
        }
        return $text;
    }
}
