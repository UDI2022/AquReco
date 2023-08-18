<?php
namespace App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';
    protected $fillable = ['email', 'control_id'];
}
