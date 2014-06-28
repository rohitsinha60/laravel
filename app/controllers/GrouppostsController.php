<?php
class GrouppostsController extends BaseController{
	
	public function index() { 
			$groups=DB::table('groups')->orderBy('groupname','asc')->lists('groupname','id');
	        $posts=DB::table('posts')->orderBy('name','asc')->lists('name','id');
			$groupposts= Grouppost::all();
        	return View::make('groupposts.index')
        		->with('groupposts',$groupposts)
        		->with('groups', $groups)
	        	->with('posts', $posts);
	}

	public function store(){
		$rules = array(
			'groups_id' => 'required|numeric',
			'posts_id' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('groupposts')
				->withErrors($validator);
		} 
		else {
			$grouppost = new Grouppost;
			$grouppost->groups_id       = Input::get('groups_id');
			$grouppost->posts_id      = Input::get('posts_id');
			$grouppost->save();

			// redirect
			Session::flash('message', 'Successfully Assigned Group!');
			return Redirect::to('groupposts');
		}
	}

	public function destroy($id)
	{
		$grouppost = Grouppost::find($id);
		$grouppost->delete();

		Session::flash('message', 'Group Unassigned!');
		return Redirect::to('groupposts');
	}
}