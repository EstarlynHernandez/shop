@extends('../base')

@section('title')
    new address
@endsection

@section('content')
    <h1 class="title">Add new Adress</h1>
    <form class="form flexContainer container" action="{{ route('user.storeAddress') }}" method="post">
        @csrf
        <fieldset class="form__section">
            <label class="form__label" for="country">Country</label>
            <input class="input" type="text" list="countryList" name="country" id="country">
            <datalist id="countryList" name='country'>
                <option>Italy</option>
                <option>Republica Dominicana</option>
                <option>España</option>
                <option>Brasil</option>
                <option>Estados Unidos</option>
                <option>China</option>
                <option>Puerto Rico</option>
            </datalist>
        </fieldset>

        <fieldset class="form__section">
            <label class="form__label" for="state">State</label>
            <input class="input" type="text" name="state" id="state">
        </fieldset>
        
        <fieldset class="form__section">
            <label class="form__label" for="postal">Postal code</label>
            <input name="postal" type="number" id="postal" class="input">
        </fieldset>

        <fieldset class="form__section">
            <label class="form__label" for="address">Address</label>
            <input name="address" type="text" id="address" class="input">
        </fieldset>

        <input type="submit" value="Add" class="link__button">
    </form>
@endsection
