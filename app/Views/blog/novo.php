<!-- novo.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?= view('_navbar') ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4">Criar Novo Post</h2>

        <!-- Formulário novo post -->
        <form action="/blog/salvar" method="post">
            <!-- Campo título -->
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <!-- Campo conteúdo -->
            <div class="mb-3">
                <label for="content" class="form-label">Conteúdo</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-success">Criar Post</button>
            <a href="/blog" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
