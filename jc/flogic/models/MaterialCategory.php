<?php namespace JC\Flogic\Models;

use Model;
use Material;
/**
 * Testing Model
 */
class MaterialCategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jc_material_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    public function updateghrth()
    {
        Material::select(['type','name'])->groupBy('name')->get()->each(function ($each){

MaterialCategory::where('name','=',$each['name'])->update(['slug' => $each['type']]);

    });




}
}