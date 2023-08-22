<section class="pageContainer">
    <form action="#" method="post" class="formAuth">

    <article class="containerAuth">
        <div>
            <h2>Welcome<?=$_SESSION['nickname']?> !</h2>
            <h3>Your are now on your profile</h3>
            <ul>
                <li>Lastname: <?php echo $Users['firstname']; ?></li>
                <li>Lastname: <?php echo $Users['lastname']; ?></li>
                <li>Email: <?php echo $Users['email']; ?></li>
                <li>Mot de passe : <span id="password">********</span></li>
                <button id="showPasswordButton">Show the password</button>
                <script>
                    const passwordSpan = document.getElementById('password');
                    const showPasswordButton = document.getElementById('showPasswordButton');

                    showPasswordButton.addEventListener('click', function() {
                        passwordSpan.textContent = 'LeMotDePasseSecret'; // Remplacez par le mot de passe réel
                    });
                </script>
                <li><a href="/update-profile"><i class="fa-solid fa-user"></i></a></li>
                    <?php if (!empty($_SESSION['Users'])): ?>
                <li><a href="/logout"><img src="./assets/img/loggout.gif" /></a></li>
                    <?php else: ?>
                <?php endif; ?>
            </ul>
    </article>
    </form>
</section>
