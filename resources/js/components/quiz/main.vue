<template>
    <div id="quiz">
        <quiz-result v-if="currentStep === 'result'"
                     :name="this.name"
                     :question-count="quizzes[0]['questionCount']"
                     :correct-answers="result.correctAnswers"
                     @quiz-end="onQuizEnd">
            {{ result.correctAnswers }}
        </quiz-result>
        <quiz-questions v-else-if="currentStep === 'questions'"
                        :quiz="currentQuiz"
                        @quiz-completed="onQuizCompleted"
                        :questionCount="currentQuiz.questionCount">
        </quiz-questions>
        <quiz-start
                v-else
                :name-prop="name"
                :quizzes="quizzes"
                @quiz-started="onQuizStarted">
        </quiz-start>
    </div>
</template>

<script>
    import axios from 'axios';
    import QuizStart from './quiz-start.vue';
    import QuizQuestions from './quiz-questions.vue';
    import Quiz from '../../models/quiz.model.js';
    import QuizResult from "./quiz-result.vue";
    export default {
        components: {
            'quiz-start': QuizStart,
            'quiz-questions': QuizQuestions,
            'quiz-result': QuizResult,
        },
        props: {
            nameProp: null,
            quizzesProp: null,
        },
        created() {
            this.name = this.nameProp;
            for (let i = 0; i < this.quizzesProp.length; i++){
                let quiz = Quiz.fromArray(this.quizzesProp[i]);
                this.quizzes.push(quiz);
            }
        },
        data() {
            return {
                currentStep: 'start',
                name: "",
                quizzes: [],
                currentQuiz: null,
                result: null,
            }
        },
        methods: {
            onQuizStarted(emittedData){
                let data = new FormData;
                data.append('name', emittedData.name);
                data.append('quizId', emittedData.quizId);
                axios.post('/quiz/start', data)
                    .then(response => {
                        if (response.data.error){
                            window.alert(response.data.error);
                            return;
                        }
                        this.currentQuiz = this.quizzes.filter(quiz => {
                            return quiz.id === emittedData.quizId;
                        })[0];
                        this.currentStep = 'questions';
                    });
            },
            onQuizCompleted(result){
                this.result = result;
                this.currentStep = 'result';
            },
            onQuizEnd(){
                this.currentQuiz = null;
                this.result = null;
                this.currentStep = 'start';
            }
        }
    }
</script>