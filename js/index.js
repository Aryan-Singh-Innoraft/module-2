$(document).ready(function () {
  $('#to_do_form').on('submit', function (e) {
    e.preventDefault();
    const task = $('.input').val();
    $.ajax({
      url: '/store',
      type: 'POST',
      data: { task: task },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = './dashboard.php';
        }
        else {
          alert("Not added");
        }
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error: " + status + " - " + error);
        console.log(xhr.responseText);
      }
    });
  })
  $('.btn-remove').on('click', function (e) {
    e.preventDefault();
    const task_id = $(this).closest('.btn-remove').data('task-id');

    $.ajax({
      url: '/remove',
      type: 'POST',
      data: { task_id: task_id },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = './dashboard.php';
        }
        else {
          alert("Not removed");
        }
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error: " + status + " - " + error);
        console.log(xhr.responseText);
      }
    });
  })

  $('.btn-tick').on('click', function (e) {
    e.preventDefault();
    const task_id = $(this).closest('.btn-tick').data('task-id');

    $.ajax({
      url: '/done',
      type: 'POST',
      data: { task_id: task_id },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = './dashboard.php';
        }
        else {
          alert("Not Updated");
        }
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error: " + status + " - " + error);
        console.log(xhr.responseText);
      }
    });
  })

  $('.btn-update').on('click', function (e) {
    e.preventDefault();
    var task_id = $(this).closest('.btn-update').data('task-id');
    $('.update-form').show(1000);
    $('.update-task-btn').on('click', function (e) {
      e.preventDefault();
      const task = $('.update-input').val();
      $.ajax({
        url: '/update',
        type: 'POST',
        data: { task_id: task_id , task: task},
        dataType: "json",
        success: function (response) {
          if (response.success) {
            $('.update-form').hide(1000);
            window.location.href = './dashboard.php';
          }
          else {
            alert("Not Updated");
          }
        },
        error: function (xhr, status, error) {
          console.log("AJAX Error: " + status + " - " + error);
          console.log(xhr.responseText);
        }
      });
     

    });

  })
})
