@props([
  'sortable' => null,

  'direction' => null,
])

<th 
    {{ $attributes->merge(['class' => 'px-6 py-3'])->only('class') }}
>
    @unless ($sortable)

      <span class="text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">{{ $slot }}</span>
      
    @else

    <button {{ $attributes->except('class') }} class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">

      <span>{{ $slot }}</span>

      @if ($direction === 'asc')

        <svg></svg>

      @elseif ($direction === 'desc')

        <svg></svg>

      @else

       <svg></svg>

      @endif

    </button>

    @endunless


</th>