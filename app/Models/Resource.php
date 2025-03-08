<?php

namespace App\Models;

use Database\Factories\ResourceFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $subtopic_id
 * @property string $title
 * @property string $url
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Subtopic|null $subtopic
 * @method static ResourceFactory factory($count = null, $state = [])
 * @method static Builder<static>|Resource newModelQuery()
 * @method static Builder<static>|Resource newQuery()
 * @method static Builder<static>|Resource query()
 * @method static Builder<static>|Resource whereCreatedAt($value)
 * @method static Builder<static>|Resource whereId($value)
 * @method static Builder<static>|Resource whereSubtopicId($value)
 * @method static Builder<static>|Resource whereTitle($value)
 * @method static Builder<static>|Resource whereType($value)
 * @method static Builder<static>|Resource whereUpdatedAt($value)
 * @method static Builder<static>|Resource whereUrl($value)
 * @mixin Eloquent
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
