export default class Score {
    constructor() {
        this.correctAnswers = 0;
        this.name = '';
    }
    static fromArray(rawData) {
        let score = new Score();

        score.correctAnswers = rawData.correctAnswers;
        score.name = rawData.name;

        return score;
    }
}