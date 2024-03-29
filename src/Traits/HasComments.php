<?php
namespace AmrNRD\Commentable\Traits;

use AmrNRD\Commentable\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    /**
     * The name of the comments model.
     *
     * @return string
     */
    public function commentableModel(): string
    {
        return config('commentable.model');
    }

    /**
     * The comments attached to the model.
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany($this->commentableModel(), 'commentable');
    }

    /**
     * Create a comment.
     *
     * @param array      $data
     * @param Model|null $parent
     *
     * @return static
     */
    public function comment(array $data)
    {
        $commentableModel = $this->commentableModel();

        $comment = (new $commentableModel())->createComment($this, $data);

        return $comment;
    }

    /**
     * Update a comment.
     *
     * @param $id
     * @param $data
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function updateComment($id, $data, Model $parent = null)
    {
        $commentableModel = $this->commentableModel();

        $comment = (new $commentableModel())->updateComment($id, $data);

        if (!empty($parent)) {
            $parent->appendNode($comment);
        }

        return $comment;
    }

    /**
     * Delete a comment.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function deleteComment(int $id): bool
    {
        $commentableModel = $this->commentableModel();

        return (bool) (new $commentableModel())->deleteComment($id);
    }

    /**
     * The amount of comments assigned to this model.
     *
     * @return mixed
     */
    public function commentCount(): int
    {
        return $this->comments->count();
    }
}
