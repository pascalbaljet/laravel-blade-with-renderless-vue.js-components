@extends('welcome')

@section('content')
<form method="POST" action="/">
    @csrf

    <file-input v-slot="fileInputProps">
        <div>
            <input type="file" name="attachment" @change="fileInputProps.changed" />
            <p v-text="fileInputProps.filename" />
        </div>
    </file-input>
</form>
@endsection
