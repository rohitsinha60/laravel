<?php 
class SubgroupsController extends BaseController{

	public function index() {
		$groups=DB::table('groups')->orderBy('groupname','asc')->lists('groupname','id');
		$subgroups=Subgroup::all();
		return View::make('subgroups.index')
			->with('groups', $groups)
			->with('subgroups',$subgroups);
	}

	public function store() {
		$rules = array(
			'groups_id' => 'required|numeric',
			'subgroup_name' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('subgroups')
				->withErrors($validator);
		} 
		else {
			$subgroup = new Subgroup;
			$subgroup->subgroup_name      = Input::get('subgroup_name');
			$subgroup->groups_id       = Input::get('groups_id');
			$subgroup->save();
			Session::flash('message', 'Sub Group Created Successfully!');
			return Redirect::to('subgroups');
		}
	}

	public function destroy($id)
	{
		$subgroup = Subgroup::find($id);
		$subgroup->delete();

		Session::flash('message', 'Sub Group Deleted Successfully!');
		return Redirect::to('subgroups');
	}
}