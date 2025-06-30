@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-400 focus:border-myRed focus:ring-myRed rounded-md shadow-sm']) }}>
