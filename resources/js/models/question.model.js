import Answer from "./answer.model";

export default class Question {
    constructor() {
        /**
         * @type {?int}
         */
        this.id = null;

        /**
         * @type {string}
         */
        this.text = '';
        this.answers = [];
    }

    /**
     *
     * @param {{}} rawData
     * @returns {Question}answers_questions_id_fk
     */
    static fromArray(rawData) {
        let question = new Question();

        question.id = rawData.id;
        question.text = rawData.text;
        question.answers = rawData.answers.map(Answer.fromArray);

        return question;
    }
}