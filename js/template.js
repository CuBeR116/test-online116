$(window).on('load', function () {
  create();
  answer();
  switchQuestion();
  checkTarget();
});

function addQuestion() {
  numberQuestion++;
  let question = $('<div>', {
    id: 'question[' + numberQuestion + ']',
    class: 'w-100 question__creates',
    html: $('<div>', {
      class: 'mt-4',
      html: '<h3>Вопрос - №' + numberQuestion + '</h3>'
    }),
    append: [
      $('<label>', {
        class: 'w-100',
        html: [
          '<p>Название вопроса - ' + numberQuestion + '</p>',
          $('<input>', {
            name: 'question[' + numberQuestion + '][name]',
            class: 'question-name',
            type: 'text',
            required: 'required',
          })
        ],
      }),
      $('<p>', {
        text: 'Варианты ответа:'
      }),
      $('<button>', {
        onclick: 'addAnswer($(this))',
        class: 'addAnswer-button',
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
    class: 'mb-4 newQuestion-block',
    html: [
      $('<span>', {
        text: numberAnswer + ')'
      }),
      $('<input>', {
        placeholder: 'Вариант ответа',
        name: 'question[' + numberQuestion + '][answer][' + numberAnswer + '][value]',
        type: 'text',
        required: 'required',
        class: 'correctAnswer',
      }),
      '<br />',
      $('<label>', {
        class: 'correctAnswer-label',
        html: [
          $('<input>', {
            type: 'checkbox',
            value: 'true',
            'data-check': '',
            name: 'question[' + numberQuestion + '][answer][' + numberAnswer + '][right]',
          }),
          'Верный вариант ответа',
        ]
      }),
      $('<button>', {
        type: 'button',
        html: 'X',
        class: 'removeButton',
        onclick: 'remove($(this))'
      }),
      '<hr />',
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
    let $this = $(this);

    $.ajax({
      url: '/cub-admin/check.php',
      type: 'post',
      data: $this.serializeArray(),
      dataType: 'json',
      success: function (data) {
        // alert(data.message);
        console.log(data.message);
        console.log(data.result);
        
        for (let key in data.result) {
          console.log(data.result[key])
        }

        $('[data-progress-bar]').css({
          width: '100%'
        });
        $('[data-progress-processing]').text(data.sum);

        $this.slideUp(function () {
          $this.remove();
        });

        let result = $('[data-result]');
        result.html($('<div>', {
          html: [
            $('<h2>', {
              text: 'Ваши результаты'
            }),
            $('<p>', {
              html: 'Всего вопросов - ' + '<strong>' + data.sum + '</strong>'
            }),
            $('<p>', {
              text: data.message
            }),
          ]
        }));

        for (let key in data.result) {
          result.append($('<p>', {
            text: data.result[key].name + ' - ' + data.result[key].result
          }));
        }

      },
      error: function () {
        alert('Ошибка');
      }
    });
  });
}

function switchQuestion() {
  let processText = $('[data-progress-processing]');
  let progressBar = $('[data-progress-bar]');
  let progressSum = Number($('[data-progress-sum]').attr('data-progress-sum'));
  $('[data-next-question]').on('click', function (e) {
    e.preventDefault();
    let $this = $(this);
    let nextBlockID = $this.attr('data-next-question');
    let parent = $this.closest('[data-question-id]');
    if (parent.find('input:checked').length > 0) {
      parent.slideUp();
      $('[data-question-id="' + nextBlockID + '"]').slideDown();
      let current = Number(parent.attr('data-question-id'));
      processText.text(parent.attr('data-question-id'));
      console.log(current);
      progressBar.css({
        'width': current / progressSum * 100 + '%',
        'display': 'block',
      });
    }
    else {
      let errorElement = $('<div>', {
        class: 'error-block',
        html: [
          $('<p>', {
            class: 'error-text',
            text: 'Выберите 1 из вариантов ответа'
          })
        ]
      });
      parent.find('input').eq(0).after(errorElement);

      setTimeout(function () {
        errorElement.fadeOut()
      }, '500');
    }
    console.log('clicked-next');
    console.log(progressBar);
  });

  $('[data-prev-question]').on('click', function (e) {
    e.preventDefault();
    let $this = $(this);
    let nextBlockID = $this.attr('data-prev-question');
    let parent = $this.closest('[data-question-id]');
    parent.slideUp();
    $('[data-question-id="' + nextBlockID + '"]').slideDown();
    console.log('clicked-prev');
  });
}

function labelTarget() {
  $('[data-answer]').on('change', 'input', function (e) {
    $(this).closest('label').toggleClass('checked');
  });
}

function checkTarget() {
  $('body').on('change', '[data-check]', function (e) {
    $(this).closest('label').toggleClass('checked');
  });
}

let numberQuestion = 0;
let numberAnswer = 1;
