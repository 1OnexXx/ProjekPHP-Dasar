<?php
require_once "koneksi.php";
session_start();

if (isset($_POST['btn-login'])) {
    // Ambil data dari form
    $password = $_POST['password'];
    $username = $_POST['username'];
    $ingataku = isset($_POST['ingataku']) ? $_POST['ingataku'] : "";

    // Periksa apakah username atau password kosong
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan Password harus diisi!";
    } else {
        // Menjalankan query menggunakan instance PDO dengan prepared statement
        $stmt = $pdo->prepare('SELECT * FROM login WHERE username = :username');
        $stmt->execute(['username' => $username]);

        // Mengambil hasil query
        $user = $stmt->fetch();

        if (!$user) {
            $_SESSION['error'] = "Username tidak tersedia";
        } elseif (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Password tidak sesuai";
        } else {
            // Login berhasil
            $_SESSION['username'] = $username;

            if (!empty($ingataku)) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 hari
            }

            // Redirect ke halaman lain setelah login berhasil
            header('Location: dashboard.php');
            exit();
        }
    }

    // Redirect kembali ke halaman login
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
    // Menampilkan alert jika ada pesan error di session
    if (isset($_SESSION['error'])) {
        echo '<script>alert("' . $_SESSION['error'] . '");</script>';
        unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
    }
    ?>
    <div class="stars"></div>
    <div class="container">
        <div class="wraper">
            <div class="nav">
                <div class="atas-nav">
                    <button class="dark-mode-button" onclick="toggleDarkMode()">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
            <div class="container-kiri">
                <input type="button" class="btn-i" value="i" onclick="showBox()">
                <div id="overlay" class="overlay" style="display: none;"></div>

                <div id="centerBox" class="center-box" style="display: none;">
                    <div class="utama-i">
                        <div class="atas-i">
                            <button class="kembali-i" onclick="kembali()">
                                << /button>
                                    <button type="button" class="cookie"> See full Cookie Policy</button>
                        </div>
                        <div class="text-i">
                            <h1 class="textH1">Lorem ipsum</h1>
                            <div class="textH1bawah">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos rem nulla exercitationem eaquequis
                                eos temporibus, maxime excepturi In this panel you can express some preferences related
                                to the processing of your personal information.You may review and change expressed choices at any time by resurfacing this panel via the provided link.To deny your consent to the specific processing activities described below, switch the toggles to off or use the “Reject all” button and confirm you want to save your choices.
                            </div>
                            <div class="btn-H1">
                                <button type="button" class="btn-reject"> ❌ Reject all</button>
                                <button type="button" class="btn-accept"> ✔️ Accept all</button>
                            </div>
                            <h2 class="textH2">Lorem ipsum, </h2>
                            <div class="bawahH2">
                                The options provided in this section allow you to customize your consent preferences for any tracking technology used for the purposes described below.
                            </div>
                            <div class="pilihan">
                                <div class="pilihan-1">
                                    <span>Necessary</span>
                                    <a href="#" class="description1">See description</a>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="pilihan-2">
                                    <span>Functionality</span>
                                    <a href="#" class="description2">See description</a>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="pilihan-3">
                                    <span>Experience</span>
                                    <a href="#" class="description3">See description</a>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="pilihan-4">
                                    <span>Measurement</span>
                                    <a href="#" class="description4">See description</a>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="pilihan-5">
                                    <span>Marketing</span>
                                    <a href="#" class="description5">See description</a>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="confirm-i">
                            <button type="button" class="confirm"> Save and continue</button>
                        </div>
                    </div>
                </div>
                <div class="atas">
                    <div class="logo">
                        <h2 class="logoTEXT">Paddle</h2>
                        <p class="text-bawah">
                        <h2 class="welcome">Welcome back to Paddle!</h2>
                        <span class="signup">Don't have an account? <a href="#">Sign Up</a></span>
                        </p>

                    </div>
                </div>
            </div>
            <div class="container-kanan" name="mode">
                <div class="bawah">
                    <div class="form">
                        <h2 class="txt-login">Login </h2>
                        <form action="" method="post">
                            <input type="text" name="username" id="username" class="username" placeholder="Email address">
                            <input type="text" name="password" id="password" class="password" placeholder="password">
                            Remember me:<label for="remember" class="rememberTXT"></label>
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="remember" name="remember" class="checkbox">
                            </div>
                            <input type="submit" value="Login" class="btn-login" id="btn-login" name="btn-login">
                            <a href="#" class="forget">Forget your password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="animasi.js"></script>
    <script src="mode.js"></script>
</body>

</html>