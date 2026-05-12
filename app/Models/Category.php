<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'target_amount', 'icon'];
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

}
