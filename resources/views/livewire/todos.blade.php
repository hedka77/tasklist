<div>
    <form wire:submit="add">
        <input type="text" wire:model.blur="todo" style="color:#000000">
        {{--<input type="text" wire:model.change="todo" style="color:#000000">--}}
        {{--<input type="text" wire:model.live.debounce.5ms="todo" style="color:#000000">--}}
        {{--<input type="text" wire:model="todo" style="color:#000000">--}}
        <button type="submit" style="margin-left: 10px">Add</button>
        <br>
        <span>Current todo: {{$todo}}</span>
        <br>
        <br>
        {{--<button type="button" wire:click="add">Add</button>--}}
    </form>

    <h2>To do's list:</h2>
    <ul>
        @foreach($todos as $t)
            <li>{{$t}}</li>
        @endforeach
    </ul>
</div>
