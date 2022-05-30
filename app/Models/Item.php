<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * 
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $weight
 * @property string $image
 * @property int $tag_id
 * 
 * @property Tag $tag
 * @property Collection|Ingredient[] $ingredients
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'items';
	public $timestamps = false;

	protected $casts = [
		'price' => 'float',
		'weight' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'weight',
		'image',
		'tag_id'
	];

	public function tag()
	{
		return $this->belongsTo(Tag::class);
	}

	public function ingredients()
	{
		return $this->belongsToMany(Ingredient::class)
					->withPivot('id');
	}
}
