<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;


    public $timestamps = false;


    protected $table = "contact_persons";


protected $fillable = ['name', 'surname', 'contact_general_id','choices','other'];


    public function general()
    {
        return $this->belongsTo(ContactGeneral::class, 'contact_general_id');
    }
}
