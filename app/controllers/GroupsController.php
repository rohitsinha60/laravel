<?php

class GroupsController extends BaseController{
	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$groups = Group::all();
		return View::make('groups.index')
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
		return View::make('groups.create');
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
			'groupname'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('groups/create')
				->withErrors($validator);
		} else {

			$group = new Group;
			$group->groupname = Input::get('groupname');
			$group->save();

			Session::flash('message', 'Group Created Successfully!');
			return Redirect::to('groups');
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
		$groupposts=DB::table('groupposts')->where('groups_id','LIKE', $data)->get();
		$subgroups=DB::table('subgroups')->where('groups_id','LIKE', $data)->get();
		$group = Group::find($id);
		return View::make('groups.show')
			->with('group', $group)
			->with('groupposts',$groupposts)
			->with('subgroups', $subgroups);
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
		$group = Group::find($id);
		return View::make('groups.edit')
			->with('group', $group);
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
			'groupname' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('groups/' . $id . '/edit')
				->withErrors($validator);
		} else {
			
			$group = Group::find($id);
			$group->groupname       = Input::get('groupname');
			$group->save();

			Session::flash('message', 'Group Successfully Updated!');
			return Redirect::to('groups');
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
		$group = Group::find($id);
		$group->delete();

		Session::flash('message', 'Group Deleted Successfully!');
		return Redirect::to('groups');
	}

}