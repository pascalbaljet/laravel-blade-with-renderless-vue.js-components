@extends('layout')

@section('content')
<form method="POST" action="/">
    @csrf

    <password-generator v-slot="passwordProps">
        <div>
            <input type="text" name="password" :value="passwordProps.password" />
            <button @click.prevent="passwordProps.generate">Generate Password!</button>
        </div>
    </password-generator>
</form>
@endsection
