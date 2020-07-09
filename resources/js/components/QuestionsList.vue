<template>
    <div>

        <excerpt v-for="question in questions" :key="question.id" :question="question"></excerpt>
    </div>
</template>

<script>
    import Excerpt from './Excerpt';
    export default {
        props: ['questions'],
        data() {
            return  {
                arrays :['edmond', 'dolores', 'Jeanne', 'uuhg']
            }

        },
        components: { Excerpt }
    }
</script>

<style scoped>

</style>