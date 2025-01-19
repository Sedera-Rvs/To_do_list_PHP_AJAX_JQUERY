$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        const task = $('input[name="task"]').val();
        
        $.ajax({
            type: 'POST',
            url: 'addtask.php',
            data: {
                task: task,
                add: true
            },
            success: function() {
                // Clear the input field
                $('input[name="task"]').val('');
                
                // Load and animate the new task
                $('#list').load('load_tasks.php', function() {
                    $('.task-item:first').hide().slideDown('slow');
                });
            }
        });
    });
});