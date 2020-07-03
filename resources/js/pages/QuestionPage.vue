<template>
    <div class="container">
        <<question :question="question"></question>
        <answers-component :question="question"></answers-component>
    </div>
</template>

<script>
    import Question from '../components/Question.vue';
    import Answers from '../components/AnswersComponent.vue';
    export default {
        components: { Question, Answers },

        props: ['question']
    }
</script>