<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Boundary[] $boundaries
 * @property Collection|City[] $cities
 * @property Collection|State[] $states
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'region';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function boundaries()
	{
		return $this->hasMany(Boundary::class, 'id_region');
	}

	public function cities()
	{
		return $this->hasMany(City::class, 'id_region');
	}

	public function states()
	{
		return $this->hasMany(State::class, 'id_region');
	}
}
