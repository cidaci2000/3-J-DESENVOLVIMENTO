<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Barbearia</title>
    <link rel="stylesheet" href="agendamento barbearia.css">
</head>

<body>
    <header>
        <h1>Agendamento de Horário</h1>
        <nav>
            <ul>
                <li><a href="home barbearia.php">Home</a></li>
                <li><a href="login barbearia.php">Login</a></li>
                <li><a href="sobre barbearia.php">Sobre Nós</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            <button type="submit">Agendar</button>
        </form>
    </main>
    <footer>
        <p></p>
    </footer>

</body>
</html>
