if (!userId) {
    const options = {
        placement: 'center',
    };

    const loginFormBtn = document.getElementById('loginFormBtn');
    const registerFormBtn = document.getElementById('registerFormBtn');

    const loginModal = document.getElementById('loginFormModal');
    const registerModal = document.getElementById('registerFormModal');

    const loginModalClose = loginModal.querySelector('.close');
    const registerModalClose = registerModal.querySelector('.close');

    loginFormBtn.addEventListener('click', () => loginModal.classList.remove('modal-hide'));
    registerFormBtn.addEventListener('click', () => registerModal.classList.remove('modal-hide'));

    loginModalClose.addEventListener('click', () => loginModal.classList.add('modal-hide'));
    registerModalClose.addEventListener('click', () => registerModal.classList.add('modal-hide'));
}
