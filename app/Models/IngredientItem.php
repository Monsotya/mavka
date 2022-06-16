<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IngredientItem
 * 
 * @property int $id
 * @property int $ingredient_id
 * @property int $item_id
 * 
 * @property Ingredient $ingredient
 * @property Item $item
 *
 * @package App\Models
 */
class IngredientItem extends Model
{
	protected $table = 'ingredient_item';
	public $timestamps = false;

	protected $casts = [
		'ingredient_id' => 'int',
		'item_id' => 'int'
	];

	protected $fillable = [
		'ingredient_id',
		'item_id'
	];

	public function ingredient()
	{
		return $this->belongsTo(Ingredient::class);
	}

	public function item()
	{
		return $this->belongsTo(Item::class);
	}
}
