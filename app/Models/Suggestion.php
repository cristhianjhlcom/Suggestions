<?php

namespace App\Models;

use App\Enums\SuggestionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Suggestion extends Model
{
    /** @use HasFactory<\Database\Factories\SuggestionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'owner_id',
        'status',
    ];

    public function casts(): array
    {
        return [
            'status' => SuggestionStatus::class,
            'created_at' => 'datetime',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'suggestion_votes')
            ->withPivot('voted_at');
    }

    public function voteCount()
    {
        return $this->votes()->count();
    }

    public function createdAtHuman(): string
    {
        return $this->created_at->diffForHumans();
    }
}
