<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeAdministracao"
           name="icon"
           class="custom-control-input"
           value="fas fa-user-tie" {{ old('icon', $course->icon) === 'fas fa-user-tie' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeAdministracao">
        <i class="fas fa-user-tie text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeBiomedicina"
           name="icon"
           class="custom-control-input"
           value="fas fa-dna" {{ old('icon', $course->icon) === 'fas fa-dna' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeBiomedicina">
        <i class="fas fa-dna text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeContabeis"
           name="icon"
           class="custom-control-input"
           value="fas fa-calculator" {{ old('icon', $course->icon) === 'fas fa-calculator' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeContabeis">
        <i class="fas fa-calculator text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeDireito"
           name="icon"
           class="custom-control-input"
           value="fas fa-balance-scale" {{ old('icon', $course->icon) === 'fas fa-balance-scale' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeDireito">
        <i class="fas fa-balance-scale text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeOdonto"
           name="icon"
           class="custom-control-input"
           value="fas fa-tooth" {{ old('icon', $course->icon) === 'fas fa-tooth' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeOdonto">
        <i class="fas fa-tooth text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconeAds"
           name="icon"
           class="custom-control-input"
           value="fas fa-desktop" {{ old('icon', $course->icon) === 'fas fa-desktop' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconeAds">
        <i class="fas fa-desktop text-primary"></i>
    </label>
</div>
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio"
           id="iconePadrao"
           name="icon"
           class="custom-control-input"
           value="fas fa-graduation-cap" {{ old('icon', $course->icon) === 'fas fa-graduation-cap' ? 'checked' : '' }}>

    <label class="custom-control-label" for="iconePadrao">
        <i class="fas fa-graduation-cap text-primary"></i>
    </label>
</div>
