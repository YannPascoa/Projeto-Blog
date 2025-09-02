<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Blog</title>
    <!-- Bootstrap para estilização rápida -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Entrar</h2>

    <!-- Mensagens flash de sucesso (ex: "Conta criada com sucesso") -->
    <?php if(session()->setFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->setFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Mensagens flash de erro (ex: "Credenciais inválidas") -->
    <?php if(session()->setFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->setFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form action="authUser" method="post">
        <?= csrf_field() ?> <!-- Token CSRF -->

        <!-- Campo email -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="<?= set_value('email') ?>"> <!-- Mantém valor digitado se houver erro -->
        </div>

        <!-- Campo senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Botão entrar -->
        <button type="submit" class="btn btn-primary">Entrar</button>
        <!-- Link para página de cadastro -->
        <a href="register" class="btn btn-link">Criar conta</a>
    </form>
</div>

</body>
</html>
