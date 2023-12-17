<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'description'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function isAvailable()
    {
        return $this->borrows->whereNull('returned_at')->isEmpty();
    }
    // app/Models/Book.php

    public function incrementAvailableCount()
    {
        $this->available_count++;
        $this->save();
    }

    public function decrementAvailableCount()
    {
        $this->available_count--;
        $this->save();
    }
}
