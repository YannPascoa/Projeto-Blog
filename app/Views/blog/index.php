

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Posts</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?= view('_navbar') ?>

<div class="container mt-5">
    <!-- Título -->
    <h1 class="mb-4 text-center">Lista de Posts</h1>

    <!-- Botão novo post -->
    <div class="d-flex justify-content-end mb-3">
        <a href="/blog/novo" class="btn btn-success">+ Novo Post</a>
    </div>

    <!-- Tabela de posts -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop nos posts -->
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            
                            <td><?= esc($post['title']) ?></td>
                            <td>
                                <!-- Ações -->
                                <a href="/blog/<?= $post['id'] ?>" class="btn btn-sm btn-primary">Ver</a>
                                <a href="/blog/editar/<?= $post['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <form action="/blog/excluir/<?= $post['id'] ?>" method="post" style="display:inline;">
                                    <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                    Excluir
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
