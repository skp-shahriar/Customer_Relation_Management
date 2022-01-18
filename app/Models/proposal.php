<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
    use HasFactory;
    
    protected $fillable = ['customer_id','subject','date','due_date','status', 'sign'];
    public function customers()
    {
        return $this->belongsTo(customers::class,'customer_id','id',);
    }
    public function proposalItem()

    {
       return $this->hasMany(ProposalItem::class) ;
    }


}

