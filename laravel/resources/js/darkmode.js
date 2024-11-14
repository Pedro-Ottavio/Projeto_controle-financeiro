document.addEventListener('DOMContentLoaded', function() {
    const toggleDarkMode = document.getElementById('toggle-dark-mode');
    const prefersDarkMode = localStorage.getItem('dark-mode') === 'true';

    if (prefersDarkMode) {
        document.body.classList.add('dark-mode');
    }

    toggleDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('dark-mode', isDarkMode);
    });
});
