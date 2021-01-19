@extends('layout')

@section('content')
<form method="POST" action="/collection">
    @php $defaultItems = old('email', [null]); @endphp

    @csrf

    <collection v-slot="props" :default='@json($defaultItems)'>
        <div>
            <div v-for="(item, key) in props.items">
                <input
                    class="mb-2 border"
                    type="text"
                    :name="`email[${key}]`"
                    :value="item"
                    :placeholder="`Email address ${key + 1}`"
                    v-on:input="(e) => { props.put(key, e.target.value) }" />
            </div>

            <button v-on:click.prevent="props.push(null)">Add more</button>
        </div>
    </collection>

    <input value="Send form" type="submit" />

    <div>
        {{ $errors }}
    </div>
</form>
@endsection
