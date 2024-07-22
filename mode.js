function toggleDarkMode() {
    const button = document.querySelector('.container-kanan'); // Mengambil elemen tombol
    const icon = document.querySelector('.fas.fa-moon'); // Mengambil elemen ikon
    const currentColor = button.style.backgroundColor;

    // Mengubah warna latar belakang dan warna ikon
    if (currentColor === 'cornsilk' || currentColor === '') {
        button.style.backgroundColor = '#222934'; // Ubah ke warna hitam
        button.style.color = 'cornsilk'; // Ubah warna teks menjadi putih
        if (icon) {
            icon.style.color = 'cornsilk'; // Ubah warna ikon menjadi putih
        }
    } else {
        button.style.backgroundColor = 'cornsilk'; // Ubah ke warna putih
        button.style.color = 'black'; // Ubah warna teks menjadi hitam
        if (icon) {
            icon.style.color = 'black'; // Ubah warna ikon menjadi hitam
        }
    }
}



