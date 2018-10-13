<div class="custom-control custom-checkbox">
    <input class="custom-control-input"
           type="checkbox"
           id="{{ $id ?? $name }}"
           name="{{ $name }}"
           {{ isset($checked) && $checked ? 'checked' : '' }} />
    <label class="custom-control-label font-weight-bold" for="{{ $id ?? $name }}">
        {{ $label }}
    </label>

	<a style="color: rgba(0, 0, 0, .4);" class="p-2" data-tooltip="tooltip"  data-toggle="tooltip" data-placement="top" title="Quando marcada esta opção, a notícia será exibida como destaque na página inicial (na parte esquerda, no carrossel), caso não seja marcada, será exibida na parte direita, em notícias secundárias">
		<i class="fas fa-question-circle fa-fw"></i> 
	</a>
</div>
