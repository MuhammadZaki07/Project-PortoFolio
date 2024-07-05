<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
    </script>
