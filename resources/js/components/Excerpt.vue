<template>
    <div class="media post">
        <div class="d-flex flex-column counters">
            <div class="vote">
                <strong> {{ question.votes_count }}{{ ' vote' }}</strong>
            </div>
            <div class="status" :class="question.status">
                <strong> {{ question.answers_count }} {{ 'answer'}}</strong>
            </div>
            <div class="view">
                 {{ question.views}} {{ 'view'}}
            </div>
        </div>
        <div class="media-body">
            <div class="d-flex align-items-center">
                <h3 class="mt-0"><a href="question->url">{{ question.title }} </a></h3>
                <div class="ml-auto">
                    <a href='questions.edit' class="btn btn-sm btn-outline-info">Edit</a>
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>

                </div>
            </div>
            <p class="lead">
                Asked by
                <a href="question->user->ur"> {{ question.user.name }} </a>
                <small class="text-muted"> {{ question.created_date}} </small>
            </p>
            <div class="excerpt"> {{ question.body }} </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['question']
    }
</script>

