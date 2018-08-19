<form action="{{ route('register') }}" method="POST">
    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a  class="nav-link active" 
                id="pills-physical-person-tab" 
                data-toggle="pill" 
                href="#pills-physical-person" 
                role="tab" 
                aria-controls="pills-physical-person" 
                aria-selected="true"><i class="fas fa-portrait  mr-1"></i> Pessoa física</a>
        </li>

        <li class="nav-item">
            <a  class="nav-link" 
                id="pills-legal-person-tab" 
                data-toggle="pill" 
                href="#pills-legal-person" 
                role="tab" 
                aria-controls="pills-legal-person" 
                aria-selected="false"><i class="fas fa-building  mr-1"></i> Pessoa jurídica</a>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-physical-person" role="tabpanel" aria-labelledby="pills-physical-person-tab">
            @include('layouts.auth._physical-person-form')
        </div>

        <div class="tab-pane fade" id="pills-legal-person" role="tabpanel" aria-labelledby="pills-legal-person-tab">
            @include('layouts.auth._legal-person-form')
        </div>
    </div>

    <div class="form-group mb-0">
        <button class="btn btn-success" type="submit">Cadastrar-se</button>
    </div>
</form>
