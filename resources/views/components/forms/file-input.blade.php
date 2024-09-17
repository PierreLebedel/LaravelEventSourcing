@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 border-0 file:rounded-sm file:border-0 file:font-bold file:font-sans file:bg-grey-100 file:text-black file:cursor-pointer hover:file:bg-indigo-100 focus:outline-none']) !!}>
