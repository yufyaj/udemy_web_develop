let a = document.querySelectorAll('a');

const answersList = document.querySelectorAll('ol.answers li');


answersList.forEach (li => li.addEventListener('click', checkClickedAnswer));

const correctAnswers = {
    question1: 'B',
    question2: 'A',
};

function checkClickedAnswer(event) {
    const clickedAnswerElement = event.currentTarget
    const selectedAnswer = clickedAnswerElement.dataset.answer;
    const questionId = clickedAnswerElement.closest('ol.answers').dataset.questionid;

    let message;
    let answerColor;

    if (selectedAnswer == correctAnswers[questionId]) {
        message = 'おめでとう正解です';
        answerColor = 'black';
    } else {
        message = 'ざんねん不正解です';
        answerColor = 'red';
    }

    alert(message);

    document.querySelector('span.correct-answer').style.color = answerColor;
    document.querySelector('div#section-correct-answer').style.display = 'block';
}