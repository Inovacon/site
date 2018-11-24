<h6 class="text-uppercase font-weight-bold text-primary">
    <i class="fas fa-user fa-fw mr-1"></i> Nome Completo
</h6>
<p>{{ $message->full_name }}</p>

<h6 class="text-uppercase font-weight-bold text-primary">
    <i class="fas fa-at fa-fw mr-1"></i> E-mail
</h6>
<p>{{ $message->email }}</p>

<h6 class="text-uppercase font-weight-bold text-primary">
    <i class="fas fa-align-justify fa-fw mr-1"></i> Conteúdo
</h6>
<p class="mb-0">{{ $message->body }}</p>
