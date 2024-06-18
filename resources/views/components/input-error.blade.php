@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="bg-green-100 border-l-4 border-green-600 text-red-600 font-bold p-4">{{ $message }}</li>
        @endforeach
    </ul>
@endif
