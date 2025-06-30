<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-myRed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-myRedd focus:bg-myRed active:bg-myRed focus:outline-none focus:ring-2 focus:ring-myRed focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
