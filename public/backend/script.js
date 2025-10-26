   const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const overlay = document.getElementById('overlay');
    const links = sidebar.querySelectorAll('a');

    // Toggle sidebar
    toggleBtn.addEventListener('click', () => {
      if (window.innerWidth < 992) {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('show');
      } else {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('full');
      }
    });

    // Close sidebar when clicking overlay
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('show');
    });

    // Close sidebar on link click (mobile)
    links.forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth < 992) {
          sidebar.classList.remove('active');
          overlay.classList.remove('show');
        }
      });
    });