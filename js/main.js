(function($) {

    'use strict';

    let newTodoInput = $('#add-new-todo');
    let editTodoInput = $('#edit-todo');
    let infoMessageBox = $('.alert-info');

    newTodoInput.on('keypress', function(e) {
        if(e.keyCode == 13 && !e.shiftKey) {
            $('#main-form').submit();
            return false;
        }
    });

    $('#main-form').submit(function(e) {
        e.preventDefault();
        let post_url = $(this).attr('action');
        let request_method = $(this).attr('method');
        let form_data = $(this).serialize();


        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data

        }).done(function(data) {
            if (data === 'success') {
                $.ajax({
                    url: '/'
                }).done(function(html) {
                    let newTodo = $(html).find('li.list-group-item:first-child');

                    newTodo.prependTo('.list-group')
                        .hide()
                        .slideDown()
                        .css({backgroundColor: '#28a745'})
                        .animate({backgroundColor: '#fff'});

                    infoMessageBox.html('Todo added successfully! <i class="ml-1 fas fa-check"></i>').delay(500).slideDown().delay(1500).slideUp();

                })
            }
        });
        newTodoInput.val('').focus();
    });

    if (editTodoInput.length) {
        let editTodoInputLength = editTodoInput.val().length;
        editTodoInput.focus();
        editTodoInput[0].setSelectionRange(editTodoInputLength, editTodoInputLength);
    }

    $('.delete-todo').on('click', function() {
        if (!confirm('Are you sure?')) { return false }
    });

    if ($('.alert-info:contains("Todo")').length > 0) {
        infoMessageBox.delay(500).slideDown().delay(1500).slideUp();
    }

})(jQuery);