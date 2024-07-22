//function i mulai
function showBox() {
    const box = document.getElementById('centerBox');
    const overlay = document.getElementById('overlay');
    box.style.display = 'flex';
    overlay.style.display = 'block';
  }
  
//function i selesai

//function kembali mulai
function kembali() {
    const box = document.getElementById('centerBox');
    const overlay = document.getElementById('overlay');
    box.style.display = 'none';
    overlay.style.display = 'none';
  }
//function kembali selesai


//particle mulai
const numStars = 20; // Jumlah bintang yang akan dibuat
const stars = []; // Array untuk menyimpan objek bintang

// Fungsi untuk membuat satu bintang
function createStar() {
  // Membuat elemen div baru untuk bintang
  const star = document.createElement('div');
  // Menambahkan kelas CSS 'star' ke elemen div
  star.classList.add('star');
  // Menetapkan posisi acak horizontal (left) bintang
  star.style.left = `${Math.random() * window.innerWidth}px`;
  // Menetapkan posisi acak vertikal (top) bintang
  star.style.top = `${Math.random() * window.innerHeight}px`;
  // Menambahkan elemen bintang ke dalam body dokumen
  document.body.appendChild(star);
  // Menambahkan objek bintang ke array stars
  stars.push({
    element: star, // Elemen DOM bintang
    velocityX: (Math.random() - 0.5) * 2, // Kecepatan horizontal acak
    velocityY: (Math.random() - 0.5) * 2  // Kecepatan vertikal acak
  });
}

// Membuat bintang sejumlah numStars
for (let i = 0; i < numStars; i++) {
  createStar();
}

// Fungsi untuk menggerakkan bintang-bintang
function animateStars() {
  // Mengulangi setiap bintang dalam array stars
  stars.forEach(s => {
    // Mengubah posisi horizontal (left) bintang berdasarkan kecepatan
    s.element.style.left = `${s.element.offsetLeft + s.velocityX}px`;
    // Mengubah posisi vertikal (top) bintang berdasarkan kecepatan
    s.element.style.top = `${s.element.offsetTop + s.velocityY}px`;

    // Jika bintang mencapai tepi kiri atau kanan jendela, balik arah horizontal
    if (s.element.offsetLeft <= 0 || s.element.offsetLeft >= window.innerWidth) {
      s.velocityX *= -1; // Balik arah kecepatan horizontal
    }
    // Jika bintang mencapai tepi atas atau bawah jendela, balik arah vertikal
    if (s.element.offsetTop <= 0 || s.element.offsetTop >= window.innerHeight) {
      s.velocityY *= -1; // Balik arah kecepatan vertikal
    }
  });
  // Meminta browser untuk menjalankan fungsi animateStars pada frame berikutnya
  requestAnimationFrame(animateStars);
}

// Memulai animasi
animateStars();
//particle selesai
