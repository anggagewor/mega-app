<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $subtopic_id
 * @property string $title
 * @property string $url
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Subtopic|null $subtopic
 * @method static \Database\Factories\ResourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereSubtopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereUrl($value)
 * @mixin \Eloquent
 */
class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['subtopic_id', 'title', 'url', 'type'];

    public function subtopic()
    {
        return $this->belongsTo(Subtopic::class);
    }
}
