<template>
    <div>
        <h1 class="game-start__title">Wanna play a quick quiz?</h1>
        <div class="game-start__select">
        <input type="text" v-model="name" class="input" placeholder="Enter your name"/>
        <select v-model.number="selectedQuizId" class="select">
            <option value="0" selected class="select__item">Please select..</option>
            <template v-for="quiz in quizzes">
                <option class="select__item" :value="quiz.id">{{quiz.title}}</option>
            </template>
        </select>
        </div>
        <button @click="startQuiz" :disabled="!isInputValid" class="button button--primary">Start</button>
    </div>
</template>
<script>
    export default {
        props:{
            quizzes:null,
            nameProp: "",
        },
        data(){
            return {
                name: "",
                selectedQuizId: 0
            }
        },methods: {
            startQuiz(){
                if(!this.isInputValid) {
                    return;
                }
                this.$emit('quiz-started', {
                    'name': this.name,
                    'quizId': this.selectedQuizId,
                })
            }
        },
        created() {
          this.name = this.nameProp
        },
        computed: {
            isInputValid(){
                let isNameValid = !!this.name && this.name.length > 3;
                let isQuizValid = this.selectedQuizId != 0;
                return isNameValid && isQuizValid;
            }
        }
    }
</script>
