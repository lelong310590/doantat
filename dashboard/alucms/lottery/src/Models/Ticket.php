<?php
/**
 * Ticket.php
 * Created by: trainheartnet
 * Created at: 7/20/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Lottery\Models;

use AluCMS\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'lottery_tickets';

    protected $fillable = [
        'user_id', 'date', 'created_at', 'deleted_at'
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ticketDetail()
    {
        return $this->hasMany(TicketDetail::class, 'ticket_id', 'id');
    }
}
