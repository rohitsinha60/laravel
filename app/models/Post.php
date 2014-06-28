<?php

class Post extends Eloquent {
	protected $fillable = [];
	protected $table='posts';
	public function groups(){
		return $this->belongs_To_Many('Group');
	}
}