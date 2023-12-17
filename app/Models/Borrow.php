<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'due_date'];

    // Add any additional relationships or methods as needed


    public function returnBook()
    {
        $this->returned_at = now();
        $this->save();

        // Increment the available count
        $this->book->incrementAvailableCount();
    }
}
