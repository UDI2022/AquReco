<?php

namespace App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Confirm extends Model
{
    use HasFactory;
    
    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'inquiry'];

}