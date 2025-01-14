<?php

namespace Modules\Recipe\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'content'];
    protected $table = 'recipe__recipe_translations';
}
