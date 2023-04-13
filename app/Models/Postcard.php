<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $price
 * @property integer $team_id
 * @property integer $is_draft
 * @property date $online_at
 * @property date $offline_at
 * @property Team $team
 * @property integer $user_id
 * @property User $user
 */

class Postcard extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
