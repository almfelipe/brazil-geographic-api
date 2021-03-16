<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boundary
 *
 * @property int $id
 * @property int|null $id_region
 * @property int|null $id_state
 * @property int|null $id_city
 * @property string $shape
 * @property string $geometry_type
 *
 * @property City|null $city
 * @property Region|null $region
 * @property State|null $state
 *
 * @package App\Models
 */
class Boundary extends Model
{
	protected $table = 'boundary';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_region' => 'int',
		'id_state' => 'int',
		'id_city' => 'int'
	];

	protected $fillable = [
		'id_region',
		'id_state',
		'id_city',
		'shape',
		'geometry_type',
	];

    protected $hidden = [
        'geometry_shape',
    ];

	public function city()
	{
		return $this->belongsTo(City::class, 'id_city');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'id_region');
	}

	public function state()
	{
		return $this->belongsTo(State::class, 'id_state');
	}
}
