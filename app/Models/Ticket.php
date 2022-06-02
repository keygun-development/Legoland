<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Ticket extends Model
{
    use HasFactory;

    public function getSelectedTickets(): ?array
    {
        if(isset($_COOKIE['tickets'])) {
            $gettickets = json_decode($_COOKIE['tickets']);
            $tickets = [];
            foreach ($gettickets as $ticket) {
                array_push($tickets, Ticket::find($ticket->id));
            }
            return $tickets;
        } else {
            return null;
        }
    }

    public function getTicketAmounts(): ?array
    {
        if(isset($_COOKIE['tickets'])) {
            $gettickets = json_decode($_COOKIE['tickets']);
            $tickets = [];
            foreach ($gettickets as $ticket) {
                array_push($tickets, $ticket->amount);
            }
            return $tickets;
        } else {
            return null;
        }
    }

    public function getTicketByID($ticketid): ?array
    {
        $tickets = (new Ticket)->where("id", $ticketid)->get()->all();
        if (count($tickets) > 0) {
            return $tickets;
        } else {
            return null;
        }
    }

    public function getType(): string
    {
        return 'ticket';
    }
}
