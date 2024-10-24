@props([
    'type' => 'ul'      // default value is 'ul'
])

@php
    $options = [
         'ul' => 'list-disc list-outside px-4',
         'ol' => 'list-decimal list-outside px-4',
         'group' => 'list-outside px-0 border border-gray-300 divide-y',
     ];
     $style = $options[$type] ?? $options['ul']
@endphp


<ul {{ $attributes->merge(['class' => $style]) }}>
    {{ $slot }}
</ul>
