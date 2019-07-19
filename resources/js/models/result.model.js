export default class Result {
    constructor() {
        /**
         * @type {string}
         */
        this.correctAnswers = 0;
    }

    /**
     *
     * @param {{}} rawData
     * @returns {Quiz}
     */
    static fromArray(rawData) {
        let result = new Result();

        result.correctAnswers = rawData.correctAnswers;
        return result;
    }
}