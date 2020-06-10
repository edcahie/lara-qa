<?php

namespace App\Policies;

use App\User;
use App\question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any questions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function view(User $user, question $question)
    {
        //
    }

    /**
     * Determine whether the user can create questions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function update(User $user, question $question)
    {
        return $user->id === $question->user_id;

    }

    /**
     * Determine whether the user can delete the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function delete(User $user, question $question)
    {
        return $user->id === $question->user_id && $question->answers_count < 1;

    }

    /**
     * Determine whether the user can restore the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function restore(User $user, question $question)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function forceDelete(User $user, question $question)
    {
        //
    }
}
