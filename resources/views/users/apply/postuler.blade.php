@extends('layouts.default')

@section('dynamicPageTitle')
Réponse à une offre de permutation
@stop

@section('content')
<div>
    <header>
        <div class="logo">
            <a href="/">PERMUT+</a>
        </div>
        <div class="menu"><i class="las la-bars"></i></div>
    </header>

    <main>
        @include('message-flash')
        <div class="container" style="margin-top: 24px">
            <div class="form">
                <form action="{{ route('envoi.notif') }}" method="post">
                    @csrf
                    <div class="row">
                        <label for="sdren">DREN actuelle</label>
                        <select name="sdren" id="sodren">
                            <option value="">Choisissez une DREN</option>
                            @foreach($drens as $dren)
                            <option value="{{ $dren->id }}">{{ $dren->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <label for="siep">IEP actuelle</label>
                        <select name="siep" id="siep">
                            <option value="">Choisissez une IEP</option>
                        </select>
                    </div>

                    <div class="row">
                        <label for="sschool">Etablissement actuel</label>
                        <select name="sschool" id="sschool">
                            <option value="">Choisissez un établissement</option>
                        </select>
                    </div>

                        <input type="hidden" name="permutationId" id="permutationId" value="{{ old('permutationId')?? $response->id }}" readonly>

                    <div class="row">
                        <label for="odren">DREN souhaitée</label>
                        <input type="text" name="odren" id="odren" value="{{ old('odren')?? $response->odren }}" readonly>
                    </div>

                    <div class="row">
                        <label for="oiep">IEP souhaitée</label>
                        <input type="text" name="oiep" id="oiep" value="{{ old('oiep')?? $response->oiep }}" readonly>
                    </div>

                    <div class="row">
                        <label for="oschool">Etablissement souhaité</label>
                        <input type="text" name="oschool" id="oschool" value="{{ old('oschool')?? $response->oschool }}" readonly>
                    </div>

                    <div class="row">
                        <label for="numero">Numéro</label>
                        <input type="text" name="phone" id="numero" value="{{ old('phone')?? $response->phone }}" readonly>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email')?? $response->email }}" readonly>
                    </div>
                    <div class="button">
                        <button type="submit" class="success">Envoyer</button>
                        <button class="cancel"><a href="{{ route('search') }}">Annuler</a></button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</div>
@stop

@section('script')
<script type="text/javascript">
        //affichage dynamique de la dren d'origine
    $('select[name="sdren"]').on('change', function() {
        var drenId = $(this).val();
        if(drenId) {
            $.ajax({
                url: '/inspection/'+encodeURI(drenId),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="siep"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siep"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        }else{
            $('select[name="siep"]').empty();
        }
    });
    // affichage des établissements dynamiquement
    $('select[name="siep"]').on('change', function() {
        var drenId = $(this).val();
        if(drenId) {
            $.ajax({
                url: '/ecoles/'+encodeURI(drenId),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="sschool"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="sschool"]').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                    });
                }
            });
        }else{
            $('select[name="sschool"]').empty();
        }
    });
</script>

@stop
