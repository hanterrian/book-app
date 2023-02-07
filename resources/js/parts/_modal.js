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

    // const loginFormModal = new Modal(loginModal, options);
    // const registerFormModal = new Modal(registerModal, options);
    //
    // loginFormBtn.addEventListener('click', () => loginFormModal.show());
    // registerFormBtn.addEventListener('click', () => registerFormModal.show());
    //
    // loginModalClose.addEventListener('click', () => loginFormModal.hide());
    // registerModalClose.addEventListener('click', () => registerFormModal.hide());
}
