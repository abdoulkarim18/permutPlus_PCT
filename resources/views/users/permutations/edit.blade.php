@extends('layouts.default')

@section('dynamicPageTitle')
Edition d'une demande de permutation
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
        <div>
            @include('message-flash')
        </div>
        <div class="container">
            <div class="form">
                <form action="{{ route('avis.update', $permutation->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="row">
                        <label for="odren">DREN actuelle</label>
                        <select name="odren" id="odren">
                            @foreach($drens as $dren)
                            <option value="{{ $dren->id }}" {{ $permutation->odren==$dren->name ? 'selected':'' }}>{{ $dren->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <label for="oiep">IEP actuelle</label>
                        <select name="oiep" id="oiep">
                            @foreach($ieps as $iep)
                            <option value="{{ $iep->id }}" {{ $permutation->oiep==$iep->name ? 'selected':'' }}>{{ $iep->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label for="oschool">Etablissement actuel</label>
                        <select name="oschool" id="oschool">
                            @foreach($etablissements as $etablissement)
                            <option value="{{ $etablissement->name }}"{{ $permutation->oschool==$etablissement->name ? 'selected':'' }}>{{ $etablissement->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                    <label for="sdren">DREN souhaitée</label>
                        <select name="sdren" id="sdren">
                            @foreach($drens as $dren)
                            <option value="{{ $dren->id }}" {{ $permutation->sdren==$dren->name ? 'selected':'' }}>{{ $dren->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label for="siep">IEP souhaitée</label>
                        <select name="siep" id="siep">
                            @foreach($ieps as $iep)
                            <option value="{{ $iep->id }}" {{ $permutation->siep==$iep->name ? 'selected':'' }}>{{ $iep->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label for="school">Etablissement souhaité</label>
                        <select name="sschool" id="sschool">
                            @foreach($etablissements as $etablissement)
                            <option value="{{ $etablissement->name }}" {{ $permutation->sschool==$etablissement->name ? 'selected':'' }}>{{ $etablissement->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label for="numero">Numéro</label>
                        <input type="text" name="phone" placeholder="Numéro de téléphone" value="{{ old('phone') ?? $permutation->phone }}" required>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="email" value="{{ old('email') ?? $permutation->email }}" >
                    </div>
                    <div class="button">
                        <button type="submit" class="success">Modifier</button>
                        <button class="cancel"><a href="{{ route('avis.index') }}">Annuler</a></button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</div>
@stop

@section('script')
<script type="text/javascript">
$(document).ready(function() {
        //affichage dynamique de la dren d'origine
    $('select[name="odren"]').on('change', function() {
        var drenId = $(this).val();
        if(drenId) {
            $.ajax({
                url: '/inspection/'+encodeURI(drenId),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="oiep"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="oiep"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        }else{
            $('select[name="oiep"]').empty();
        }
    });
    // affichage des établissements dynamiquement
    $('select[name="oiep"]').on('change', function() {
        var drenId = $(this).val();
        if(drenId) {
            $.ajax({
                url: '/ecoles/'+encodeURI(drenId),
                type: "GET",
                dataType: "json",
                success:function(data) {
                $('select[name="oschool"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="oschool"]').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                    });
                }
            });
        }else{
            $('select[name="oschool"]').empty();
        }
    });
    //affichage dynamique de la localité souhaitée
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
});
</script>

@stop
