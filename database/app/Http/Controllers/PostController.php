<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Session\Store;


class PostController extends Controller
{
   	public function getIndex(){
	    $post = resolve('App\Post');
	    $posts = $post->getPosts();
	    return view('blogIndex', ['posts' => $posts]);
	}

	public function getAdminIndex(){
		$post = resolve('App\Post');
	    $posts = $post->getPosts();
	    return view('adminIndex', ['posts' => $posts]);
	}

	public function getPost($id){
	    $post = resolve('App\Post');
	    $posts = $post->getPost($id);
	    return view('blogPost', ['posts' => $posts]);
	}

	public function getAdminCreate(){
		return view('adminCreate');
	}

	public function getAdminEdit(){
		$post = resolve('App\Post');
	    $posts = $post->getPost($id);
	    return view('adminEdit', ['post'=>$post, 'postId' => $id]);
	}

	public function postAdminCreate(Request $request){
		$this->validate($request, [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);
		$post = resolve('App\Post');
		$post->addPost($request->input('title'), $request->input('content'));

		return redirect()
		->route('adminIndex')
		->with('info', 'Post Created, Title: ' . $request->input('title'));
	}

	public function postAdminUpdate(Request $request){
		$this->validate($request, [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);
		$post = resolve('App\Post');
		$post->editPost($request->input('id'), $request->input('title'), $request->input('content'));

		return redirect()
		->route('adminIndex')
		->with('info', 'Post Updated, new Title: ' . $request->input('title'));
	}
}


