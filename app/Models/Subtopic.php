<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * 
 *
 * @property int $id
 * @property int $topic_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Content> $contents
 * @property-read int|null $contents_count
 * @property-read string $initials
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @property-read \App\Models\Topic|null $topic
 * @method static \Database\Factories\SubtopicFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtopic whereUpdatedAt($value)
 * @mixin \Eloquent
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
