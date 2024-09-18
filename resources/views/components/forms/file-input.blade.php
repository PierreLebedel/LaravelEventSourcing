@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full text-sm text-slate-500 file:mr-3 file:py-3 file:px-3 border border-gray-300 rounded-md shadow-sm outline:none focus:border-indigo-500 focus:ring-indigo-500 file:rounded-left-sm file:border-0 file:font-bold file:font-sans file:bg-grey-100 file:text-black file:cursor-pointer hover:file:bg-indigo-100 focus:outline-indigo-500']) !!}>
