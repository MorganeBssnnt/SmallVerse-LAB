<div class="login-content">
    <!-- Icônes des réseaux sociaux en haut à droite -->
    <div class="social-icons-top">
        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank"><i class="fab fa-x-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <!-- Image de la page d'accueil -->
    <img src="assets/img/home.png" alt="Home" class="home-image">

    <!-- Formulaire de connexion -->
    <div class="login-container">
        <br>
        <img src="assets/img/brand2.png" alt="Brand" class="brand-image">
        <form action="../core/dispatcher.php?action=login" method="POST" class="login-form">
            <!-- username input -->
            <div class="form-group">
                <label for="username">Identifiant</label>
                <div class="input-container">
                    <input type="text" id="username" name="username" required>
                </div>
            </div>
            <!-- password input -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-container">
                    <input type="password" id="password" name="password" required>
                    <button type="button" id="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Affichage du message d'erreur -->
            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="error-message"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
            <?php endif; ?>

            <button type="submit" class="login-btn">Connexion</button>
        </form>
        <!-- Lien vers l'inscription -->
        <div class="signup-link">
            <p>Pas encore de compte ? <a href="signup.php">Inscrivez-vous ici</a></p>
        </div>
    </div>
</div>

<script>
    // Script pour afficher/masquer le mot de passe
    document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', passwordFieldType);
        this.innerHTML = passwordFieldType === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });
</script>