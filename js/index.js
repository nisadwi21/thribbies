// LOGIN POPUP
const openLogin = document.getElementById('openLogin');
const loginPopup = document.getElementById('loginPopup');
const closeLogin = document.getElementById('closeLogin');

if (openLogin && loginPopup && closeLogin) {
  openLogin.addEventListener('click', () => {
    loginPopup.style.display = 'block';
  });

  closeLogin.addEventListener('click', () => {
    loginPopup.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target === loginPopup) {
      loginPopup.style.display = 'none';
    }
  });
}

// KATEGORI DROPDOWN
const kategoriBtn = document.getElementById('kategoriBtn');
const kategoriDropdown = document.getElementById('kategoriDropdown');
const kategoriIcon = document.getElementById('kategoriIcon');

kategoriBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  kategoriDropdown.classList.toggle('show-dropdown');
  
  // toggle icon panah
  if (kategoriDropdown.classList.contains('show-dropdown')) {
    kategoriIcon.classList.remove('fa-chevron-down');
    kategoriIcon.classList.add('fa-chevron-up');
  } else {
    kategoriIcon.classList.remove('fa-chevron-up');
    kategoriIcon.classList.add('fa-chevron-down');
  }
});

document.addEventListener('click', (e) => {
  if (!kategoriDropdown.contains(e.target) && e.target !== kategoriBtn) {
    kategoriDropdown.classList.remove('show-dropdown');
    kategoriIcon.classList.remove('fa-chevron-up');
    kategoriIcon.classList.add('fa-chevron-down');
  }
});

function toggleFavorit(produkId, event) {
  event.preventDefault();

  fetch('favorit.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ produk_id: produkId })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'added') {
      event.target.classList.remove('fa-regular');
      event.target.classList.add('fa-solid');
    } else if (data.status === 'deleted') {
      event.target.classList.remove('fa-solid');
      event.target.classList.add('fa-regular');
    } else {
      alert(data.message);
    }
  })
  .catch(err => console.error('Error:', err));
}
// ==================== USER DROPDOWN ====================
const userBtn = document.getElementById("userBtn");
const userDropdown = document.getElementById("userDropdown");

if (userBtn && userDropdown) {
  userBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    userDropdown.style.display = (userDropdown.style.display === "block") ? "none" : "block";
  });

  userDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  window.addEventListener("click", () => {
    userDropdown.style.display = "none";
  });
}


document.querySelectorAll('.love-icon').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    let produkId = this.getAttribute('data-id');
    let icon = this.querySelector('i');

    fetch('favorit.php', {  // ← ini wajib love.php
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id_produk=' + produkId
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'added') {
        icon.classList.remove('fa-regular');
        icon.classList.add('fa-solid');
        icon.style.color = 'red';
      } else if (data.status === 'removed') {
        icon.classList.remove('fa-solid');
        icon.classList.add('fa-regular');
        icon.style.color = '';
      } else if (data.status === 'login') {
        alert('Silakan login terlebih dahulu.');
        window.location.href = 'login.php';
      }
    });
  });
});
function openReportModal() {
  document.getElementById("reportModal").style.display = "block";
}

function closeReportModal() {
  document.getElementById("reportModal").style.display = "none";
}

window.onclick = function(event) {
  const modal = document.getElementById("reportModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
