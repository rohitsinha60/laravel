<?php

class Subgroup extends Eloquent {
	protected $fillable = [];
	protected $table='subgroups';
	public function groups(){
		return $this->belongs_To_many('Group');
	}
}