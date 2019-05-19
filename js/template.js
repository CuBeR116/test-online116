$(window).on('load', function () {
  create();
  answer();
});

function addQuestion(element) {
  numberQuestion++;
  var question = $('<div>', {
    id: 'question[' + numberQuestion + ']',
    class: 'w-100',
    html: $('<p>', {
      html: '<h3>Вопрос - №' + numberQuestion + '</h3>'
    }),
    append: [
      $('<label>', {
        html: [
          '<p>Название вопроса - ' + numberQuestion + '</p>',
          $('<input>', {
            name: 'question[' + numberQuestion + '][name]',
            type: 'text',
            required: 'required'
          })
        ],
      }),
      $('<p>', {
        text: 'Варианты ответа:'
      }),
      $('<button>', {
        onclick: 'addAnswer($(this))',
        type: 'button',
        html: 'Добавить вариант ответа',
      }),

    ]
  });
  $('[data-create]').append(question);
  numberAnswer = 1;
  console.log(question);
}

function addAnswer(element) {
  console.log(element.html());
  let objAnswer = $('<div>', {
    class: 'w-100',
    html: [
      $('<span>', {
        text: numberAnswer + ')'
      }),
      $('<input>', {
        placeholder: 'Вариант ответа',
        name: 'question[' + numberQuestion + '][answer][' + numberAnswer + '][value]',
        type: 'text',
        required: 'required'
      }),
      '<br />',
      $('<label>', {
        html: [
          $('<input>', {
            type: 'checkbox',
            value: 'true',
            name: 'question[' + numberQuestion + '][answer][' + numberAnswer + '][right]',
          }),
          'Верный вариант ответа',
        ]
      }),
      $('<button>', {
        type: 'button',
        html: 'X',
        onclick: 'remove($(this))'
      }),
      '<br />'
    ]
  });
  element.before(objAnswer);
  numberAnswer++;
}

function remove(element) {
  $(element).closest('div').remove();
}

function create() {
  $('[data-create]').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      url: '/cub-admin/create.php',
      type: 'post',
      data: $(this).serializeArray(),
      dataType: 'json',
      success: function (data) {
        alert(data.message);
      },
      error: function () {
        alert('Ошибка');
      }
    });
  });
}

function answer() {
  $('[data-answer]').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      url: '/cub-admin/check.php',
      type: 'post',
      data: $(this).serializeArray(),
      dataType: 'json',
      success: function (data) {
        // alert(data.message);
        console.log(data.message);
        console.log(data.result);
      },
      error: function () {
        alert('Ошибка');
      }
    });
  });
}

let numberQuestion = 0;
let numberAnswer = 1;
