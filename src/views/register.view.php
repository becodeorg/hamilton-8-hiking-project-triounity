<section class="pageContainer">
    <article class="containerAuth">
        <div class="authLeft">
            <h2>Welcome Back!</h2>
            <p>To keep connected with us please login with your personal info</p>
            <a href="/login" class="toggle-page">Sign in</a>
        </div>
        <div class="authRight">
            <h2>Sign in to RandoMarre</h2>
            <h3>Or use your email</h3>
            <form action="#" method="post" class="formAuth">
                <div>
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Your firstname"/>
                    <?php if (isset($errors['firstname'])): ?>
                        <span class="error-message"><?= $errors['firstname'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Your lastname"/>
                    <?php if (isset($errors['lastname'])): ?>
                        <span class="error-message"><?= $errors['lastname'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="nickname">Nickname</label>
                    <input type="text" id="nickname" name="nickname" placeholder="Your nickname"/>
                    <?php if (isset($errors['nickname'])): ?>
                        <span class="error-message"><?= $errors['nickname'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email"/>
                    <?php if (isset($errors['email'])): ?>
                        <span class="error-message"><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your password"/>
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-message"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                
                <button type="submit">Sign up</button>
            </form>
        </div>
    </article>
</section>