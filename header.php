<header>
    <nav>
        <ul style="background: #adadad">
            <li><a href="index.php">Home</a></li>
            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="GameReviews.php">Game reviews</a></li>
                <li><a href="CategoryGames.php">Best Games from Category</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>

        </ul>
    </nav>
</header>
