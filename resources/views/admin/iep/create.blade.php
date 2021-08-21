@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Enregistremenr des DREN
@stop


@section('content')
<div>
    <div id="formAct">
        <div class="text-right mb-3">
            <button class="btn btn-outline-info btn-lg" id="blockExcel">Importation dans un fichier Excel</button>
        </div>
        <div id="form" class="form-border">
            <form action="{{ route('admin-ieps.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="mb-3">Inspection d'Enseignement Primaire</label>
                    <div class="mb-4">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dren_id" class="mb-3">DREN</label>
                    <select name="dren_id" id="oschool" class="form-control">
                        <option value="">Choisissez une DREN</option> 
                        @foreach($drens as $dren)
                        <option value="{{ $dren->id }}">{{ $dren->name }}</option> 
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mr-auto">ENREGISTRER</button>
            </form>
        </div>
    </div>
    <div id="fichier_excel" style="display:none">
        <div class="text-right mb-3">
            <a href="{{ route('admin-ieps.create') }}" class="btn btn-outline-info btn-lg" id="blockForm" style="display:none">Revenir au formulaire</a>
         </div>
        <div class="form-border">
            <form action="{{ route('importExcelIep') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="import_file" class="mb-3">Le fichier Excel à importer (Les entêtes (Inspection d'Enseignement Primaire, DREN(des valeurs doivent êtes des entiers)) ne doivent pas figurés pas dans le fichier à importer !)</label>
                    <div class="mb-4">
                        <input type="file" class="form-control" id="import_file" name="import_file" required accept=".xlsx, .xls, .csv">
                    </div>
                </div>
                <button class="btn btn-primary mr-auto">Importer</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
             $('#blockExcel').click(function() {
               $('#fichier_excel').toggle("slide");
               $('#formAct').toggle("slide");
               $('#blockExcel').toggle('slide');
               $('#blockForm').toggle('slide');
             });
         });
    </script>
@endsection