<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function getCurrentTickets(): string
    {
        $data = "<script>document.write(localStorage.getItem('ticket_object'));</script>";
        dd(Ticket::where('id', 1));
        return $data;
    }
}
