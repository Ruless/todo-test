<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function scopeInProcess() {
        return $this->where('complite', false)->get();
    }

    public function scopeIsComplite() {
        return $this->where('complite', true)->get();
    }
}
