<!-- editar.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?= view('_navbar') ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4">Editar Post</h2>

        <!-- Formulário de edição -->
        <form action="/blog/atualizar/<?= $post['id'] ?>" method="post">
            <!-- Campo título -->
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" 
                       value="<?= esc($post['title']) ?>" required>
            </div>

            <!-- Campo conteúdo -->
            <div class="mb-3">
                <label for="content" class="form-label">Conteúdo</label>
                <textarea name="content" id="content" class="form-control" rows="5" required><?= esc($post['content']) ?></textarea>
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="/blog" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
