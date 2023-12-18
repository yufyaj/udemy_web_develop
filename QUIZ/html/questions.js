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

    const form = new FormData();

    form.append('id', questionId);
    form.append('selectedAnswer', selectedAnswer);

    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'answer.php');

    xhr.send(form);

    xhr.addEventListener('loadend', function(event) {
        /** @type {XMLHttpRequest} */
        const xhr = event.currentTarget;
        
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.response);
            displayResult(response.result, response.correctAnswer, response.correctAnswerValue, response.explanation);
        } else {
            alert('error: 回答データ取得失敗');
        }
    });

    // displayResult();
}

function displayResult(result, correctAnswer, correctAnswerValue, explanation) {
    let message;
    let answerColor;

    if (result) {
        message = 'おめでとう正解です';
        answerColor = 'black';
    } else {
        message = 'ざんねん不正解です';
        answerColor = 'red';
    }

    document.querySelector('span#correctAnswerValue').innerHTML = correctAnswer + '. ' + correctAnswerValue;
    document.querySelector('span#explanation').innerHTML = explanation;

    alert(message);

    document.querySelector('span.correct-answer').style.color = answerColor;
    document.querySelector('div#section-correct-answer').style.display = 'block';
}