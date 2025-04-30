document.addEventListener('DOMContentLoaded', function() {
    // Manejar clicks en los botones dropdown
    document.addEventListener('click', function(e) {
        const dropdownButton = e.target.closest('.dropdown-button');
        if (dropdownButton) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownMenu = dropdownButton.nextElementSibling;
            const buttonRect = dropdownButton.getBoundingClientRect();
            
            // Cerrar otros dropdowns abiertos
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu) menu.classList.add('hidden');
            });
            
            // Posicionar el menú relativo al botón
            dropdownMenu.style.top = `${buttonRect.bottom + window.scrollY}px`;
            dropdownMenu.style.left = `${buttonRect.left + buttonRect.width/2}px`;
            
            dropdownMenu.classList.toggle('hidden');
        }
        
        // Cerrar dropdowns al hacer click fuera
        if (!e.target.closest('.dropdown-button') && !e.target.closest('.dropdown-menu')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
});