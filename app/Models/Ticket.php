<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Builder
 */
class Ticket extends ModelAbstract
{
    use HasFactory;
    private int $id;
    private string $name;
    private string $description;
    private string $price;

    public function __construct()
    {
        $this->id = DB::table('tickets')->value('id');
        $this->name = DB::table('tickets')->value('name');
        $this->description = DB::table('tickets')->value('description');
        $this->price = DB::table('tickets')->value('price');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

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
        return 'tickets';
    }
}
