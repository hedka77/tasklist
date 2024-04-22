<div>
    Count: {{$count}}

    <button wire:click="increment">+1</button>
    <button wire:click="increment(2)">+2</button>
    <button wire:click="decrement(5)">-5</button>
    {{--<button wire:mouseenter="increment">hover</button>--}}
    {{--<button wire:click.window="increment">click window</button>--}}
    {{--<button wire:click.throttle.1000ms="increment">click</button>--}}
</div>
