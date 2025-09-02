

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhe do Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?= view('_navbar') ?>


<div class="container mt-5">
    <!-- Card com detalhes -->
    <div class="card shadow p-4">
        <h2 class="mb-3"><?= esc($post['title']) ?></h2>
        <p class="lead"><?= esc($post['content']) ?></p>

        <!-- Botões de navegação -->
        <div class="mt-4">
            <a href="/blog" class="btn btn-secondary">← Voltar</a>
            <a href="/blog/editar/<?= $post['id'] ?>" class="btn btn-warning">Editar</a>
            <form action="/blog/excluir/<?= $post['id'] ?>" method="post" style="display:inline;">
                <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Tem certeza que deseja excluir este post?')">
                Excluir
                </button>
            </form>

        </div>
    </div>
</div>

<!-- Seção de comentários -->
    <div class="card shadow p-4 mb-4">
        <h4>Comentários</h4>

        <?php if (!empty($comments)): ?>
            <ul class="list-group mt-3">
                <?php foreach ($comments as $comment): ?>
                    <li class="list-group-item">
                        <!-- Conteúdo do comentário -->
                        <p class="mb-1"><?= esc($comment['content']) ?></p>

                        <!-- Rodapé com autor e data -->
                        <small class="text-muted">
                            Por usuário  <?= esc($comment['username']) ?> 
                            em <?= date('d/m/Y', strtotime($comment['created_at'])) ?>
                        </small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted mt-3">Ainda não há comentários neste post.</p>
        <?php endif; ?>
    </div>

    <!-- Formulário para novo comentário (apenas se logado) -->
    <?php if (session()->get('isLoggedIn')): ?>
        <div class="card shadow p-4">
            <h5>Adicionar Comentário</h5>
            <form action="/comments/add" method="post">

                <!-- Campo oculto com o ID do post -->
                <input type="hidden" name="post_id" value="<?= esc($post['id']) ?>">

                <!-- Área de texto para o comentário -->
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Escreva seu comentário..." required></textarea>
                </div>

                <!-- Botão de envio -->
                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        </div>
    <?php else: ?>
        <div class="alert alert-warning mt-3">
            Você precisa <a href="auth/login">fazer login</a> para comentar.
        </div>
    <?php endif; ?>

</div>

</body>
</html>
