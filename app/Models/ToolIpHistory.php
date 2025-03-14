<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $ip
 * @property string|null $response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ToolIpHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ToolIpHistory extends Model
{
    protected $fillable = [
        'ip',
        'response',
    ];
}
