<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdContact extends Model
{

    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    protected $fillable = ['name', 'email', 'inquiry', 'created_at', 'updated_at'];
}

class AdUpContact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'inquiry',
    ];
}