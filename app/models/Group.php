<?php

class Group extends Eloquent {
	protected $fillable = [];
	protected $table='groups';
	public function posts(){
		return $this->belongs_To_many('Post');
	}
	public function subgroups(){
		return $this->belongs_To_many('Subgroup');
	}
}