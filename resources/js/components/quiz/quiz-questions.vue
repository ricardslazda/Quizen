<template>
   <div v-if="loading">
       Loading...
   </div>
  <div v-else>
      <h1 class="question__title">{{currentQuestion.text}}</h1>
      <template v-for="answer in currentQuestion.answers">
          <button class="button button--small"
                  @click="selectedAnswer = answer; selectAnswer(); $event.target.classList.add('button--active')">{{answer.text}}</button>
      </template>
      <br/>
      <button @click="saveAnswer" class="button button--primary">Next</button>
  </div>
</template>

<script>
    import Result from '../../models/result.model';
    import axios from 'axios';
    import Question from '../../models/question.model';
    export default {
        data(){
            return{
                currentQuestion:null,
                selectedAnswer: null,
            }
        },
        props: {
            /**
             * @type Quiz
             */
            quiz:null,
            questionCount: 0,
        },
        computed: {
            loading(){
              return !this.currentQuestion;
            }
        },
        created() {
            this.getNextQuestion();
        },
        methods: {
            saveAnswer() {
                function selectAnswer() {
                    var buttons = document.querySelectorAll(".button");
                    buttons.forEach(function(button) {
                        button.classList.remove("button--active");
                    });
                }
                selectAnswer();
                let data = new FormData;
                data.append('questionId', this.currentQuestion.id);
                data.append('answerId', this.selectedAnswer.id);

                axios.post('/quiz/save-answer', data)
                    .then(response => {
                        this.getNextQuestion();
                    });
            },
            getNextQuestion() {
                axios.post('/quiz/get-question')
                    .then(response => {
                        if(response.data.hasOwnProperty('result')) {
                            let result = Result.fromArray(response.data.result);
                            this.$emit('quiz-completed', result);
                            return;
                        }
                        this.currentQuestion = Question.fromArray(response.data.question);
                    });
            },
            selectAnswer(){
                var buttons = document.querySelectorAll(".button");
                buttons.forEach(function(button) {
                   button.classList.remove("button--active");
                });
            }
        }
        }
</script>