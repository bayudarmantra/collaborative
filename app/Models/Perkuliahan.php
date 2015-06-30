<?php

class Perkuliahan extends Eloquent
{
	protected $table = 'perkuliahan';
	protected $primaryKey = 'kodekelas';

	public function mk()
	{
		return $this->belongsTo('Matakuliah','kodemk');
	}

	public function dosen()
	{
		return $this->belongsTo('Dosen','nip');
	}
}