@extends('layouts.app', ['style'=>[]])

@section('dynamicPageTitle')
  Connexion
@stop


@section('content')
<div>
    <div class="animation">
      <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
        <div class="loginbackground box-background--white padding-top--64">
          <div class="loginbackground-gridContainer">
            <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
              <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
              </div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
              <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
              <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
              <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
              <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
              <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
              <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
              <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
              <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <main>

<div class="form-container">
  <form action="{{route('login')}}" method="post">

    <div class="top">
      CONNEXION
    </div>
    @csrf
    <div class="form-div">
      <input type="text" name="matricule" pattern="[0-9]{6}[A-Z]{1}" placeholder="Matricule" id="matricule" required>
      @error('matricule')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
    <div class="form-div">
      <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Mot de passe" required>
      @error('password')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
    <div class="form-div">
      <button type="submit" class="form-button">SE CONNECTER</button>
    </div>

    <div class="bottom">
      <div><em style="color:#365 ">Vous n'avez pas de compte ?</em> <a href="{{ route('register') }}">Incrivez-vous</a></div>
      <div><a href="{{ route('password.request') }}">Mot de passe oublié?</a></div>
    </div>

  </form>

</div>
</main>


</div>
@stop
