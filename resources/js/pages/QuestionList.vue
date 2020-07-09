<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> All Questions</h2>
                            <div class="ml-auto">
                                <a >Ask Question</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div v-for="question in questions" class="alert alert-warning">
                            <p >{{ question.body_html }}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['questions']
    }
</script>
