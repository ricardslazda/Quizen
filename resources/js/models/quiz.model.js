export default class Quiz {
    constructor() {
        /**
         * @type {?int}
         */
        this.id = null;

        /**
         * @type {string}
         */
        this.title = '';
        this.questionCount = 0;
    }

    /**
     *
     * @param {{}} rawData
     * @returns {Quiz}
     */
    static fromArray(rawData) {
        let quiz = new Quiz();

        quiz.id = rawData.id;
        quiz.title = rawData.title;
        quiz.questionCount = rawData.questionCount; //

        return quiz;
    }
}