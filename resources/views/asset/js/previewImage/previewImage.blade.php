<script>
    document.getElementById('avatar').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('previewImage');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = 'https://via.placeholder.com/50';
        }
    });

    function previewProjectImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const projectImagePreview = document.getElementById('projectImagePreview');
                projectImagePreview.src = e.target.result;
                const projectImagePreviewContainer = document.getElementById('projectImagePreviewContainer');
                projectImagePreviewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    function previewCertificateImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const certificateImagePreviewContainer = document.getElementById(
                    'certificateImagePreviewContainer');
                const certificateImagePreview = document.createElement('img');
                certificateImagePreview.src = e.target.result;
                certificateImagePreview.classList.add('max-w-xl', 'h-auto', 'rounded-lg', 'object-cover');
                certificateImagePreviewContainer.innerHTML = '';
                certificateImagePreviewContainer.appendChild(certificateImagePreview);
                certificateImagePreviewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPostImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreviewContainer = document.getElementById('imagePreviewContainer');
                const imagePreview = document.getElementById('postImagePreview');
                const text = document.getElementById('text');
                imagePreview.innerHTML = `<img src="${e.target.result}" class="w-22 h-30" />`;
                imagePreviewContainer.classList.remove('hidden');
                text.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
