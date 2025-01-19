$(document).ready(function() {
    // Délégation d'événement pour gérer les futurs éléments
    $('#list').on('click', '.delete-btn', function(e) {
        e.preventDefault();
        
        const deleteLink = $(this);
        const taskItem = deleteLink.closest('.task-item');
        const deleteUrl = deleteLink.attr('href');
        
        // Animation de suppression
        taskItem.css('background-color', '#ffe6e6')
               .animate({
                   marginLeft: '100%',
                   opacity: 0
               }, 500, function() {
                   // Requête Ajax pour supprimer la tâche
                   $.ajax({
                       url: deleteUrl,
                       type: 'GET',
                       success: function(response) {
                           taskItem.slideUp(300, function() {
                               $(this).remove();
                           });
                       },
                       error: function() {
                           // En cas d'erreur, rétablir l'élément
                           taskItem.animate({
                               marginLeft: '0',
                               opacity: 1
                           }, 500).css('background-color', '#f9f9f9');
                       }
                   });
               });
    });
}); 