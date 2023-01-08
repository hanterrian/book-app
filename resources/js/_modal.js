if (!userId) {
    const loginFormBtn = document.getElementById('loginFormBtn');
    const registerFormBtn = document.getElementById('registerFormBtn');

    const loginFormModal = new bootstrap.Modal(document.getElementById('loginFormModal'));

    const registerFormModal = new bootstrap.Modal(document.getElementById('registerFormModal'));

    loginFormBtn.addEventListener('click', () => loginFormModal.show());
    registerFormBtn.addEventListener('click', () => registerFormModal.show());
}
