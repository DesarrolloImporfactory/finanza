</div>
</div>

<!-- Avatar con menú desplegable -->
<div class="fixed top-4 right-4 ">
    <span id="avatar-btn" class="bg-white rounded-full shadow-2xl cursor-pointer">
        <img class="w-12 h-12 rounded-full" src="./imgs/avatar.png" alt="foto">
    </span>
    <div id="profile-menu" class="absolute right-0 mt-4 w-48 bg-white rounded-lg shadow-lg hidden">
        <a href="#profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
        <a href="#logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cerrar Sesión</a>
    </div>
</div>

<!-- Floating button for mobile -->
<button id="menu-icon" class="fixed bottom-4 right-4 md:hidden bg-gray-800 text-white p-3 rounded-full focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<script>
    const menuIcon = document.getElementById('menu-icon');
    const sidebar = document.getElementById('sidebar');
    const dropdown = document.getElementById('dropdown');
    const avatarBtn = document.getElementById('avatar-btn');
    const profileMenu = document.getElementById('profile-menu');

    menuIcon.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
    });

    function toggleDropdown() {
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        if (avatarBtn.contains(event.target)) {
            profileMenu.classList.toggle('hidden');
        } else {
            if (!profileMenu.contains(event.target)) {
                profileMenu.classList.add('hidden');
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>