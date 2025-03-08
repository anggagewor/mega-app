<?php

namespace App\Models;

use Database\Factories\TopicFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $initials
 * @property-read Collection<int, Subtopic> $subtopics
 * @property-read int|null $subtopics_count
 * @method static TopicFactory factory($count = null, $state = [])
 * @method static Builder<static>|Topic newModelQuery()
 * @method static Builder<static>|Topic newQuery()
 * @method static Builder<static>|Topic query()
 * @method static Builder<static>|Topic whereCreatedAt($value)
 * @method static Builder<static>|Topic whereDescription($value)
 * @method static Builder<static>|Topic whereId($value)
 * @method static Builder<static>|Topic whereName($value)
 * @method static Builder<static>|Topic whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function subtopics(): HasMany|Topic
    {
        return $this->hasMany(Subtopic::class);
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
