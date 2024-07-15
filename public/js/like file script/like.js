$(document).ready(function() {
    $('.like-button').on('click', function() {
        var form = $(this).closest('.like-form');
        var commentId = form.find('input[name="comment_id"]').val();
        var likeCount = form.find('.like-count');
        var heartIcon = form.find('.fa-heart');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                comment_id: commentId
            },
            success: function(response) {
                if (response.liked) {
                    heartIcon.addClass('text-red-500');
                } else {
                    heartIcon.removeClass('text-red-500');
                }
                likeCount.text(parseInt(likeCount.text()) + (response.liked ? 1 : -1));
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
