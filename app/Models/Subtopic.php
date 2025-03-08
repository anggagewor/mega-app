<?php

namespace App\Models;

use Database\Factories\SubtopicFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property int $topic_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Content> $contents
 * @property-read int|null $contents_count
 * @property-read string $initials
 * @property-read Collection<int, Resource> $resources
 * @property-read int|null $resources_count
 * @property-read Topic|null $topic
 * @method static SubtopicFactory factory($count = null, $state = [])
 * @method static Builder<static>|Subtopic newModelQuery()
 * @method static Builder<static>|Subtopic newQuery()
 * @method static Builder<static>|Subtopic query()
 * @method static Builder<static>|Subtopic whereCreatedAt($value)
 * @method static Builder<static>|Subtopic whereDescription($value)
 * @method static Builder<static>|Subtopic whereId($value)
 * @method static Builder<static>|Subtopic whereName($value)
 * @method static Builder<static>|Subtopic whereTopicId($value)
 * @method static Builder<static>|Subtopic whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Subtopic extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id', 'name', 'description'];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function contents(): HasMany|Subtopic
    {
        return $this->hasMany(Content::class);
    }

    public function resources(): HasMany|Subtopic
    {
        return $this->hasMany(Resource::class);
    }

    public function getInitialsAttribute(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2) // Ambil cuma 2 kata pertama
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->join('');
    }
}
