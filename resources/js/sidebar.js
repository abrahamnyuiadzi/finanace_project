
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.responsive-sidebar');
    const mainWrapper = document.querySelector('.main-wrapper');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        mainWrapper.classList.toggle('shifted');
    });

    document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
            sidebar.classList.remove('show');
            mainWrapper.classList.remove('shifted');
        }
    });

