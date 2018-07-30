// Limita os botões "submit" de formulários a apenas 1 click
// e adiciona o icone de "carregando" ao lado

$('form').one('submit', function() {
    $(this).find('button[type="submit"]').attr('disabled', true);
    $(this).find('button[type="submit"]').prepend('<i class="fas fa-spinner fa-pulse fa-fw"></i>&nbsp;');
});