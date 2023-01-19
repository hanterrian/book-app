let avatarUpload = document.querySelector('.avatar-upload');
let avatarSelect = avatarUpload.querySelector('img');

avatarSelect.addEventListener('click', () => {
    avatarUpload.querySelector('input[type=file]').click();
});
