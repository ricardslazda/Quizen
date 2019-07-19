<template>
    <div class="game-result">
        <h1 class="game-result__title">Thanks, {{name}}</h1>
        <p class="game-result__score">You answered correctly to {{correctAnswers}} out of {{questionCount}}</p>
        <a class="button button--primary" @click="goToQuizStart">Do it again</a>
    </div>
</template>

<script>
    export default {
        props:{
            quizzes:null,
            name: null,
            questionCount: null,
            correctAnswers: null,
        },
        methods:{
            goToQuizStart(){
                this.$emit('quiz-end')
            }
        }
    }
</script>