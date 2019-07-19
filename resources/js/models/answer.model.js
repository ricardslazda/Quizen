export default class Answer {
    constructor() {
        /**
         * @type {?int}
         */
        this.id = null;

        /**
         * @type {string}
         */
        this.text = '';
    }

    /**
     *
     * @param {{}} rawData
     * @returns {Quiz}
     */
    static fromArray(rawData) {
        let answer = new Answer();

        answer.id = rawData.id;
        answer.text = rawData.text;

        return answer;
    }
}