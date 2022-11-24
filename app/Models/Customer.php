<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['cpf', 'name', 'email', 'address', 'phone'];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
