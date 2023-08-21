<section class="pageContainerUpdateProfile">
    <h1>Update Profile</h1>
    <form method="POST" action="#">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?= $userData['firstname'] ?>"><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?= $userData['lastname'] ?>"><br>
        
        <label for="nickname">Nickname:</label>
        <input type="text" name="nickname" value="<?= $userData['nickname'] ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $userData['email'] ?>"><br>
        
        <label for="password">Current Password:</label>
        <input type="password" name="password"><br>
        
        <button type="submit">Update Profile</button>
</form>

</section>

