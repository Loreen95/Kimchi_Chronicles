const inputElement = document.querySelector('input[type="file"]');
const previewElement = document.querySelector('#image-preview');

inputElement.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', (event) => {
        previewElement.src = event.target.result;
        previewElement.style.display = 'block';
    });

    reader.readAsDataURL(file);
});