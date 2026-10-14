<?php

namespace App\Models;

use CodeIgniter\Model;

class RobloxModel extends Model
{
    protected $table            = 'roblox_game';
    protected $primaryKey       = 'id_game';
    protected $allowedFields    = ['nama_game', 'genre', 'developer', 'active_players'];
}