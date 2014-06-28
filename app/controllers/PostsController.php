<?php

class PostsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$posts = Post::all();
		$groups=DB::table('groups')->get();
		return View::make('posts.index')
			->with('posts', $posts)
			->with('groups', $groups);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'       => 'required',
			'phone'      => 'required',
			'city' => 'required',
			'branch' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('posts/create')
				->withErrors($validator);
		} else {

			$post = new Post;
			$post->name       = Input::get('name');
			$post->phone      = Input::get('phone');
			$post->city = Input::get('city');
			$post->branch = Input::get('branch');
			$post->save();

			Session::flash('message', 'Record Submitted Successfully!');
			return Redirect::to('posts');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		Session::put('id',$id);
		$data=Session::get('id');
		$groupposts=DB::table('groupposts')->where('posts_id','LIKE', $data)->get();
		$post = Post::find($id);
		return View::make('posts.show')
			->with('post', $post)
			->with('groupposts', $groupposts);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')
			->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'       => 'required',
			'phone'      => 'required',
			'city' => 'required',
			'branch' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('posts/' . $id . '/edit')
				->withErrors($validator);
		} else {
			
			$post = Post::find($id);
			$post->name       = Input::get('name');
			$post->phone      = Input::get('phone');
			$post->city = Input::get('city');
			$post->branch = Input::get('branch');
			$post->save();

			Session::flash('message', 'Record Successfully Updated!');
			return Redirect::to('posts');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();

		Session::flash('message', 'Record Deleted Successfully!');
		return Redirect::to('posts');
	}

}