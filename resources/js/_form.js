let avatarUpload = document.querySelector('.avatar-upload');

if (avatarUpload) {
    let avatarSelect = avatarUpload.querySelector('img');

    avatarSelect.addEventListener('click', () => {
        avatarUpload.querySelector('input[type=file]').click();
    });
}
