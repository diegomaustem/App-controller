<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function rules() {
        return [
            'name'  => 'required',
            'price' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function Custumer()
    {
        return $this->belongsTo(Customer::class);
    }
}
