<?php

namespace App\Models;

use Database\Factories\ContentFactory;
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
 * @property string|null $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Subtopic|null $subtopic
 * @method static ContentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Content newModelQuery()
 * @method static Builder<static>|Content newQuery()
 * @method static Builder<static>|Content query()
 * @method static Builder<static>|Content whereBody($value)
 * @method static Builder<static>|Content whereCreatedAt($value)
 * @method static Builder<static>|Content whereId($value)
 * @method static Builder<static>|Content whereSubtopicId($value)
 * @method static Builder<static>|Content whereTitle($value)
 * @method static Builder<static>|Content whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Content extends Model
{
    use HasFactory;

    protected $fillable = ['subtopic_id', 'title', 'body'];

    public function subtopic()
    {
        return $this->belongsTo(Subtopic::class);
    }
}
