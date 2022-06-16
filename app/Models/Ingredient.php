<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingredient
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Ingredient extends Model
{
	protected $table = 'ingredients';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function items()
	{
		return $this->belongsToMany(Item::class)
					->withPivot('id');
	}
}
