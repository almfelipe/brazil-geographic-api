<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @property int $id
 * @property int $id_region
 * @property int $id_state
 * @property string $name
 * @property string $capital
 * @property int $order_map
 * @property float $latitude
 * @property float $longitude
 * @property int $altitude
 * @property float $area
 *
 * @property Region $region
 * @property State $state
 * @property Collection|Boundary[] $boundaries
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'city';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_region' => 'int',
		'id_state' => 'int',
		'order_map' => 'int',
		'latitude' => 'float',
		'longitude' => 'float',
		'altitude' => 'int',
		'area' => 'float'
	];

	protected $fillable = [
		'id_region',
		'id_state',
		'name',
		'capital',
		'order_map',
		'latitude',
		'longitude',
		'altitude',
		'area'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'id_region');
	}

	public function state()
	{
		return $this->belongsTo(State::class, 'id_state');
	}

	public function boundaries()
	{
		return $this->hasMany(Boundary::class, 'id_city');
	}

    public function boundary(){
        return $this->hasOne(Boundary::class, 'id_city');
    }

}
