$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var countQuestions = 0;
  
  $("#btnCreateQuestion").click(function(){
    var question = `
      <div class="questionContainer content">
        <div class="question">
          <h3>Вопрос №${++countQuestions}:</h3>
          <label>Вопрос:<input class="vQuestion" type="text"></label>
          <label class="answer">
            Ответ:
            <input class="vAnswer" type="text">
            <button class="del" type="button">x</button>
            <input class="vTrue" type="checkbox">
          </label>
          <label class="answer">
            Ответ:
            <input class="vAnswer" type="text">
            <button class="del" type="button">x</button>
            <input class="vTrue" type="checkbox">
          </label>
        </div>
        <button class="btnCreateAnswer" type="button">Добавить ответ</button>
      </div>  
    `;
    $("#questions").append(question);    
  });

  $('body').on('click', '.btnCreateAnswer', function(){
    var answer = `          
      <label class="answer">
        Ответ:
        <input class="vAnswer" type="text">
        <button class="del" type="button">x</button>
        <input class="vTrue" type="checkbox">
      </label>`;
    $(this).siblings(".question").append(answer);    
  });

  $('body').on('keyup', '.question .vAnswer:last', function(){
    var answer = `          
      <label class="answer">
        Ответ:
        <input class="vAnswer" type="text">
        <button class="del" type="button">x</button>
        <input class="vTrue" type="checkbox">
      </label>`;
    $(this).parent().parent().append(answer);
    console.log("last");    
  });

  $('body').on('click', '.del', function(){
    $(this).parent().remove();    
  });

  $(".btnExit").click(function(){
    $(".main").hide();
    $(".askuser").fadeIn();
  });

  $(".btnNo").click(function(){
    $(".main").fadeIn();
    $(".askuser").hide();
  });

  $(".btnYes").click(function(){
    window.location.replace("/");
  });

  $(".btnSave").click(function(){
    var data = new Object();
    var testname = $("#testname").val();
    if(testname == ""){
      alert("Заполните поле \'Название теста\'");
      return;
    }
    var questions = [];

    $(".question").each(function(index, element){
      var question = new Object();
      var answers = [];
      var vQuestion = $(element).find(".vQuestion").val();
      if(vQuestion == ""){
        alert("Заполните поле \'Вопрос\'");
        return;
      }
      $(element).find(".answer").each(function(index, element){
        var answer = new Object();
        var vAnswer = $(element).find(".vAnswer").val();
        var vTrue = $(element).find(".vTrue").prop("checked");
        if(vAnswer != ""){
          answer["option_text"] = vAnswer;
          answer["is_correct"] = vTrue;
          answers.push(answer);
        }
      });
      question["question_text"] = vQuestion;
      question["options"] = answers;
      questions.push(question);
    });
    data["testname"] = testname;
    data["questions"] = questions;

    console.log(data);

    $.ajax({
      type: 'POST',
      url: "http://127.0.0.1:8001/api/tests",
      contentType : 'application/json',
      data: JSON.stringify(data),
      success: function(data){
        console.log("Успешно");
      }
    });

  });
});
