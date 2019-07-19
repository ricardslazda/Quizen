import Vue from 'vue';

Vue.component('quiz', require('./components/quiz/main.vue').default);
new Vue({
    el: '#app',
});