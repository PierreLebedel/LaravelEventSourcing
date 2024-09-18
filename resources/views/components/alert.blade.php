@props(['type'=>'info', 'icon'=>false, 'dismissible'=>false])

@php
$color = match($type){
    'info'    => 'blue',
    'success' => 'green',
    'warning' => 'orange',
    'danger'  => 'red',
    default   => 'blue',
};
@endphp

<div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
    {{ $attributes->merge(['class' => 'relative flex w-full shadow-md items-center gap-3 py-3 px-4 pt-2.5 overflow-hidden border-t-4 border-'.$color.'-300 bg-'.$color.'-100 text-'.$color.'-500 mb-6']) }}
    role="alert" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">

    @if($icon)
    <div class="bg-{{ $color }}-500/15 text-{{ $color }}-500 rounded-full p-1" aria-hidden="true">

        @if($type=='success')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                clip-rule="evenodd" />
        </svg>
        @elseif($type=='warning')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                clip-rule="evenodd" />
        </svg>
        @elseif($type=='danger')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                clip-rule="evenodd" />
        </svg>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                clip-rule="evenodd" />
        </svg>
        @endif
    </div>
    @endif

    <div>
        @if(isset($title))
        <h3 class="text-md font-bold">{!! $title !!}</h3>
        @endif

        @if($slot->isNotEmpty())
        <div class="text-sm text-slate-600">{!! $slot !!}</div>
        @endif
    </div>

    @if($dismissible)
    <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none"
            stroke-width="2.5" class="w-4 h-4 shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    @endif

</div>