<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'company_name',
        'photo',
        'phone',
        'address',
        'vat_number'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
