<form action="../control/loginController.php" method="post">
    <hr>
    <div>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" />
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" />
    </div>
    <input type="hidden" name="action" value="login">
    <hr>
    <input type="submit" value="ok">
    <hr>
</form>