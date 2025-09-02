<?php $session = session(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <!-- Logo / Nome do Blog -->
        <a class="navbar-brand" href="/blog">Blog do Yann</a>

        <!-- Botões de navegação -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if($session->get('isLoggedIn')): ?>
                    <!-- Usuário logado -->
                    <li class="nav-item">
                        <span class="nav-link">Olá, <?= esc($session->get('username')) ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/logout">Sair</a>
                    </li>

                    <?php if($session->get('role') === 'admin'): ?>
                        <!-- Link extra para admins -->
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Usuário não logado -->
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register">Cadastrar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
