$(document).ready(function() {
    $('.grid-view').on('click', '#grid-delete', function(event) {
        event.preventDefault();
        var urlString = $(this).attr('href');
        var url = urlString.split('?')[0];
        var id = urlString.split('=')[1];
        $.post({
          url: url,
          data: {id: id},
          success: function(result) {
            $.pjax.reload('#grid-pjax', {timeout : false});
          }
        });
    });
});