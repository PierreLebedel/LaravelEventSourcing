@props(['coversion_size'=>'small', 'size'=>'8', 'url'=>null])

@php
    if(is_null($url)){
        $url = auth()->user()->getFirstMediaUrl('profile-picture', $coversion_size);
    }
@endphp

<div x-data="{ url: '{{ $url }}' }" 
    x-on:profile-picture-updated.window="url = $event.detail.conversions.{{ $coversion_size }};"
    >
    <img x-bind:src="url" {!! $attributes->merge(['class' => 'rounded-full h-'.$size.' w-'.$size]) !!} />
</div>