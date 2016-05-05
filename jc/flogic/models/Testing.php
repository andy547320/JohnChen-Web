<?php namespace JC\Flogic\Models;

use Model;

/**
 * Testing Model
 */
class Testing extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jc_flogic_testings';

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

}