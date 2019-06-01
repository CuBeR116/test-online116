$(window).on('load', function () {
  authorization();
  deleteTest();
});

function authorization() {
  $('[data-form-login]').on('submit', function (e) {
    e.preventDefault();
    let $this = $(this);
    console.log($this.attr('action'));
    $.ajax({
      url: $this.attr('action'),
      type: 'post',
      data: $this.serializeArray(),
      dataType: 'json',
      success: function (data) {
        console.log(data);
        if (data.result === 'error') {
          if ($this.find('[data-login-result]').length === 0) {
            console.log($this);
            $this.append($('<div>', {
              attr: {
                'data-login-result': ''
              }
            }));
          }

          let result = $this.find('[data-login-result]');
          result.html($('<div>', {
            class: 'loginResult-block',
            html: [
              $('<h3>', {
                html: data.errorTitle,
                class: 'error',
              }),
              $('<p>', {
                html: data.errorText
              }),
            ]
          }));
        }
        else if (data.result === 'success') {
          $(location).attr('href', data.url);
        }
      },
      error: function () {
        alert('Ошибка');
      }
    });
  });
}

function deleteTest() {
  $('[data-test-delete]').on('click', function (e) {
    e.preventDefault();
    let $this = $(this);
    $this.closest('[data-delete-parent]').fadeOut(function () {
      $(this).remove();
    });

    $.ajax({
      url: $this.data('action'),
      type: 'post',
      data: {
        'file': $this.data('test-delete'),
        'type': 'delete'
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
      },
      error: function () {
        alert('Ошибка');
      }
    });
  });
}