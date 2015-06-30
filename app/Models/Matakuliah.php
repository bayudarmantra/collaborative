<?php

class Matakuliah extends Eloquent
{	
	//protected $fillable = array('kodemk', 'namamk', 'sks', 'prodi', 'status', 'created_at', 'updated_at');
	protected $table = 'matakuliah';
	protected $primaryKey = 'kodemk';
}