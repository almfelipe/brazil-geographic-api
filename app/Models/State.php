<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property int $id_region
 * @property string $initials
 * @property string $name
 * @property float $area
 * @property int $order_map
 * @property float $latitude
 * @property float $longitude
 * 
 * @property Region $region
 * @property Collection|Boundary[] $boundaries
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'state';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_region' => 'int',
		'area' => 'float',
		'order_map' => 'int',
		'latitude' => 'float',
		'longitude' => 'float'
	];

	protected $fillable = [
		'id_region',
		'initials',
		'name',
		'area',
		'order_map',
		'latitude',
		'longitude'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'id_region');
	}

	public function boundaries()
	{
		return $this->hasMany(Boundary::class, 'id_state');
	}

	public function cities()
	{
		return $this->hasMany(City::class, 'id_state');
	}
}
