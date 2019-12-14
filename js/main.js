(function($) {

    'use strict';

    let newTodoInput = $('#add-new-todo');

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
                    let newTodo = $(html).find('li.list-group-item:last-child');

                    newTodo.appendTo('.list-group')
                        .hide()
                        .slideDown()
                        .css({backgroundColor: '#28a745'})
                        .animate({backgroundColor: '#fff'});
                })
            }
        });
        newTodoInput.val('').focus();
    });

})(jQuery);