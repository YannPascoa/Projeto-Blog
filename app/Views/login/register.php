<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Blog</title>
    <!-- Importa o Bootstrap para estilização rápida -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Criar Conta</h2>

    <!-- Exibir mensagens temporárias de sucesso -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Exibir mensagens temporárias de erro -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Formulário de cadastro -->
    <form action="create" method="post">
        <!-- Token CSRF automático do CodeIgniter -->
        <?= csrf_field() ?>

        <!-- Campo usuário -->
        <div class="mb-3">
            <label for="username" class="form-label">Usuário</label>
            <input type="text" name="username" id="username" class="form-control" 
                   value="<?= set_value('username') ?>"> <!-- Mantém valor digitado se houver erro -->
            <?php if(isset($validation) && $validation->getError('username')): ?>
                <small class="text-danger"><?= $validation->getError('username') ?></small>
            <?php endif; ?>
        </div>

        <!-- Campo e-mail -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="<?= set_value('email') ?>">
            <?php if(isset($validation) && $validation->getError('email')): ?>
                <small class="text-danger"><?= $validation->getError('email') ?></small>
            <?php endif; ?>
        </div>

        <!-- Campo senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php if(isset($validation) && $validation->getError('password')): ?>
                <small class="text-danger"><?= $validation->getError('password') ?></small>
            <?php endif; ?>
        </div>

        <!-- Campo confirmar senha -->
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmar Senha</label>
            <input type="password" name="password_confirm" id="password_confirm" class="form-control">
            <?php if(isset($validation) && $validation->getError('password_confirm')): ?>
                <small class="text-danger"><?= $validation->getError('password_confirm') ?></small>
            <?php endif; ?>
        </div>

        <!-- Botão enviar -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <!-- Link para página de login -->
        <a href="login" class="btn btn-link">Já tem conta? Faça login</a>
    </form>
</div>

</body>
</html>
