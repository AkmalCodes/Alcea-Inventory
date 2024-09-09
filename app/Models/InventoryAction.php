<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAction extends Model
{
    use HasFactory;

    protected $table='inventory_actions';

    protected $fillable = [
        'action_type',
        'inventory_id',
        'performed_by',
        'quantity_changed',
        'reason_for_action',
    ];
}
