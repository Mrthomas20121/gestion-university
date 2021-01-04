<nav class="navbar fixed-bottom navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Université d'Orléans</a>
        <?php if(isset($_SESSION['user'])) echo '<span class="navbar-text me-2">Connectée en tant que : '. $_SESSION['user']['username'] . '</span>'; ?>
    </div>
</nav>
</body>