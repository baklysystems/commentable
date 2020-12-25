<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Commentable.
 *
 */

namespace AmrNRD\Commentable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Kalnoy\Nestedset\NodeTrait;

class Comment extends Model
{
    use NodeTrait;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the commentable entity that the comment belongs to.
     *
     * @return mixed
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('commentable.user'));
    }

    /**
     * Determine if a comment has child comments.
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }

    /**
     * Create a comment and persists it.
     *
     * @param Model $commentable
     * @param array $data
     * @param Model $creator
     *
     * @return static
     */
    public function createComment(Model $commentable, array $data): self
    {
        return $commentable->comments()->create($data);
    }

    /**
     * Update a comment by an ID.
     *
     * @param int   $id
     * @param array $data
     *
     * @return bool
     */
    public function updateComment(int $id, array $data): bool
    {
        return (bool) static::find($id)->update($data);
    }

    /**
     * Delete a comment by an ID.
     *
     * @param int $id
     *
     * @return bool
     */
    public function deleteComment(int $id): bool
    {
        return (bool) static::find($id)->delete();
    }
}
