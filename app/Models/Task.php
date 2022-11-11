<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Task extends Model
{
    use HasFactory;
    protected$fillable = ['name'];
    protected$casts = ['user_id' => 'int'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
