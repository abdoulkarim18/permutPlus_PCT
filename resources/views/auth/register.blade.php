@extends('layouts.app')

@section('dynamicPageTitle')
    Inscription
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
        <form action="{{ route('register') }}" method="post">
        @csrf
          <div class="top">
            INSCRIPTION
          </div>

          <div class="form-div">
            <input type="text" class="@error('nom') is-invalid @enderror" value="{{ old('nom') }}" name="nom" placeholder="Nom" required>
            @error('nom')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('nom')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="text" class="@error('prenoms') is-invalid @enderror" value="{{ old('prenoms') }}" name="prenoms" placeholder="Prénoms" required>
            @error('prenoms')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('prenoms')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="text" name="contact" value="{{ old('contact') }}" class="@error('contact') is-invalid @enderror" placeholder="Contact" required>
            @error('contact')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('contact')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Mail" required>
            @error('email')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('email')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="text" name="matricule" value="{{ old('matricule') }}" pattern="[0-9]{6}[A-Z]{1}" class="@error('matricule') is-invalid @enderror" placeholder="Matricule">
            @error('matricule')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('matricule')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="password" name="password" id="motdepasse" class="@error('password') is-invalid @enderror" placeholder="Mot de passe" required> <i class="fas fa-eye" onclick="Afficher()"></i>
            @error('password')
              <div class="invalid-feedback" role="alert">
                <em>{{$errors->first('password')}}</em>
              </div>
            @enderror
          </div>
          <div class="form-div">
            <input type="password" name="password_confirmation" placeholder="Confirmer votre mot de passe" autocomplete="new-password">
          </div>
          <div class="form-div">
            <button type="submit" class="form-button">S'INSCRIRE</button>
          </div>

          <div class="bottom">
            <a href="{{ route('login') }}">Vous avez déjà un compte?</a>
          </div>

        </form>

      </div>

    </main>
</div>
@stop
