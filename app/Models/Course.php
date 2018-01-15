<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** 
* Model crud course
* @author Maximiliano Garbate 
*/

class Course extends Model
{
public $fillable = ['code','description','price','image'];

}
