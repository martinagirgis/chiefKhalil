let getQuizData = (content,contentNum,callBack=()=>{})=>{
    let finalQuiz = {finalAnswers:[],finalQuestions:[],finalModalAnswers:[]}
    let answers = content[contentNum].quiz[0].answer
    let questions = content[contentNum].quiz[0].question
    let modelAnswer = content[contentNum].quiz[0].modelAnswer
    let startPoint = 0
    // Questions
    for (let i = 0; i < questions.length; i++) {
        if (questions[i] == '\n'){
            finalQuiz.finalQuestions.push(questions.slice(startPoint,i))
            startPoint = i+1
        }
        if (i == questions.length-1){
            finalQuiz.finalQuestions.push(questions.slice(startPoint,i+1))
        }
    }
    // console.log(finalQuiz.finalQuestions)
    // Modal Answer
    startPoint = 0
    for (let i = 0; i < modelAnswer.length; i++) {
        if (modelAnswer[i] == '\n'){
            finalQuiz.finalModalAnswers.push(modelAnswer.slice(startPoint,i))
            startPoint = i+1
        }
        if (i == modelAnswer.length-1){
            finalQuiz.finalModalAnswers.push(modelAnswer.slice(startPoint,i+1))
        }
    }
    // console.log(finalQuiz.finalModalAnswers)
    // Answers
    startPoint = 0
    let rowOfAnswer = []
    for (let i = 0; i < answers.length; i++) {
        if (answers[i] == '\n'){
            let answerRow = answers.slice(startPoint,i)
            let secondStartPoint = 0
            for (let j = 0; j < answerRow.length; j++) {
                if (answerRow[j] == '|'){
                    rowOfAnswer.push(answerRow.slice(secondStartPoint,j))
                    secondStartPoint = j+1
                }
                if(j == answerRow.length-1){
                    rowOfAnswer.push(answerRow.slice(secondStartPoint,j+1))
                }
            }
            finalQuiz.finalAnswers.push(rowOfAnswer)
            rowOfAnswer = []
            startPoint = i+1
        }
        if (i == answers.length-1){
            let answerRow = answers.slice(startPoint,i+1)
            let secondStartPoint = 0
            for (let j = 0; j < answerRow.length; j++) {
                if (answerRow[j] == '|'){
                    rowOfAnswer.push(answerRow.slice(secondStartPoint,j))
                    secondStartPoint = j+1
                }
                if(j == answerRow.length-1){
                    rowOfAnswer.push(answerRow.slice(secondStartPoint,j+1))
                }
            }
            finalQuiz.finalAnswers.push(rowOfAnswer)
            rowOfAnswer = []
        }
    }
    // console.log(finalQuiz.finalAnswers)
    callBack(finalQuiz)
}
var contentLength ;
findCourseById(sessionStorage.getItem("CID") ,function (result) {
    console.log(result["content"].length);
    contentLength = result["content"].length -1;
    sessionStorage.setItem("contentLength",contentLength)
},function (error) {
    console.log("fail");
})
//console.log(contentLength);
function setQuestionNumber(data)
{
    var questionNumber = document.getElementById("questionNumber").textContent;
    questionNumber = parseInt(questionNumber);
    if (questionNumber < data["finalQuestions"].length) {
        var num = questionNumber + 1 ;
        num = num.toString();
        document.getElementById('questionNumber').innerHTML = num;
        setQuestion(data);
        setAnswers(data);
        console.log("stell");
        console.log(num);
    }
    else{
        examdiv.style.display = "none";
        scoreDiv.style.display = "block";
        var x = document.getElementById('score').textContent;
        var scoreInt = parseInt(x);
        console.log(scoreInt);
        if (scoreInt<50)
        {
            console.log("no");
            document.getElementById('nextLeson').value = "إعادة الدرس";
            
        }
        else
        {
            var oldScore = sessionStorage.getItem("scoreN");
            oldScore = parseInt(oldScore);
            newScore = oldScore + 1;
            if (sessionStorage.getItem("contentLength") == oldScore) {
                sessionStorage.setItem("scoreN",0);
                console.log("scoreN = 0");
                var enrolment ={
                    quizScore: 0,
                    status: "finshed",
                }
                findEnrollmentsByCourseIDUser(sessionStorage.getItem("CID"),sessionStorage.getItem("email") ,function (result) {
                    console.log(sessionStorage.getItem("CID"));
                    console.log(sessionStorage.getItem("email"));
                    console.log(result);
                    updateEnrollments(result,enrolment ,function (result) {
                        console.log("success all");
                        
                    },function (error) {
                        console.log("fail");
                    })
                },function (error) {
                    console.log("fail");
                })
            }
            else {
                sessionStorage.setItem("scoreN",newScore);
                console.log("scoreN = +1");
                console.log("kjijiji");
                var enrolment ={
                    quizScore: newScore
                }
                findEnrollmentsByCourseIDUser(sessionStorage.getItem("CID"),sessionStorage.getItem("email") ,function (result) {
                    console.log(sessionStorage.getItem("CID"));
                    console.log(sessionStorage.getItem("email"));
                    console.log(result);
                    updateEnrollments(result,enrolment ,function (result) {
                        console.log("success all");
                        
                    },function (error) {
                        console.log("fail");
                    })
                },function (error) {
                    console.log("fail");
                })
            
            }
        }
      
    }
}

function setQuestion(data){
    var questionNumber = document.getElementById("questionNumber").textContent;
    questionNumber = parseInt(questionNumber);
    var num = questionNumber - 1 ;
    var progresss = (num/data["finalQuestions"].length)*100;

    document.getElementById('progresss').innerHTML = `<div id="" class="progress-bar bg-warning" role="progressbar" style="width: `+progresss+`%" aria-valuenow="`+progresss+`%" aria-valuemin="0" aria-valuemax="100">`+progresss+`</div>`;
    
    document.getElementById('question').innerHTML = data["finalQuestions"][num];

    console.log(data["finalQuestions"][num]);
}

function setAnswers(data){
    var questionNumber = document.getElementById("questionNumber").textContent;
    questionNumber = parseInt(questionNumber);
    var num = questionNumber - 1 ;
    var ans = "";
    for (let t = 0; t < data["finalAnswers"][num].length; t++) {
        ans += `<input class="" type="radio" name="flexRadioDefault" id="`+data["finalAnswers"][num][t]+`" value="`+data["finalAnswers"][num][t]+`" >
        <label  class="form-check-label"  for="`+data["finalAnswers"][num][t]+`">` + data["finalAnswers"][num][t] + ` </label>
        </div><br>`;
        console.log(data["finalAnswers"][num][t]);
    }
    document.getElementById('answer').innerHTML = ans;
}

function setProgress(data){

}

var score = 0 ;

function getScore(data){
    var questionNumber = document.getElementById("questionNumber").textContent;
    questionNumber = parseInt(questionNumber);
    var num = questionNumber - 1 ;

    var radios = document.getElementsByName('flexRadioDefault');
    var value;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].type === 'radio' && radios[i].checked) {
            value = radios[i].value; 
            console.log("value:" + value);
            if(data["finalModalAnswers"][num]==value){
                console.log("correct");
                score = score + 1;
                console.log("score : " + score );
                var scorePresent = (score/data["finalQuestions"].length)*100;
                document.getElementById('score').innerHTML = scorePresent ;
            }
            else{
                console.log("false");
                //console.log(data["finalModalAnswers"][num].toUpperCase());
                //console.log(value.toUpperCase());

            }
        }
    }
}

function next(){
    getCourseContent(sessionStorage.getItem("CID"),(content)=>{
        getQuizData(content,sessionStorage.getItem("scoreN"),(data)=>{
            getScore(data);
            setQuestionNumber(data);
        })
    })
}

function lessons() {
    location.href = "training.html";
}



// findCourseById(sessionStorage.getItem("CID") ,function (result) {
//     console.log(result["content"][sessionStorage.getItem("scoreN")]["quiz"][0]);
//     var urll = result["content"][sessionStorage.getItem("scoreN")]["url"];
//     document.getElementById ("myVedio").innerHTML = `<source src="`+ urll +`">`;

// },function (error) {
//     console.log("fail");
// })