@extends('layouts.master')

@section('dynamicPageTitle')
Demande de pumutation
@stop

@section('content')
<div>
    <main>
        <div>
            @include('message-flash')
        </div>
        <div class="permutation">
            <div class="form">
                <form action="{{ route('avis.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <label for="odren">DREN actuelle</label>
                        <select name="odren" id="odren">
                            <option value="">Choisissez une DREN</option>
                            @foreach($drens as $dren)
                            <option value="{{ $dren->id }}">{{ $dren->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label for="siep">IEP actuelle</label>
                        <select name="oiep" id="oiep">
                            <option value="">Choisissez une IEP</option> 
                        </select>
                    </div>
                    <div class="row">
                        <label for="oschool">Etablissement actuel</label>
                        <select name="oschool" id="oschool">
                            <option value="">Choisissez un établissement</option> 
                        </select>
                    </div>
                    <div class="row">
                        <label for="sdren">DREN souhaitée</label>
                        <select name="sdren" id="sdren">
                            <option value="">Choisissez une DREN</option>
                            @foreach($drens as $dren)
                            <option value="{{ $dren->id }}">{{ $dren->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <label for="siep">IEP souhaitée</label>
                        <select name="siep" id="siep">
                            <option value="">Choisissez une IEP</option> 
                        </select>
                    </div>

                    <div class="row">
                        <label for="sschool">Etablissement souhaité</label>
                        <select name="sschool" id="sschool">
                            <option value="">Choisissez un établissement</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="phone">Numéro</label>
                        <input type="text" name="phone" placeholder="Numéro de téléphone" value="{{ Auth::user()->contact }}" readonly>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="button"><button type="submit">Envoyer</button></div>
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
