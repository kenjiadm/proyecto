@props([
    'headers',
    'inputRows',
    'tag'
    ])
<table class="table">
    <thead>
        <tr>
            @foreach ( $headers as $header)
            <th>{{$header}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @for ($index = 0; $index < $inputRows; $index++)
        <tr>
            @foreach ( $headers as $header)
            <td>
                <div class="form-group my-2 align-items-center">
                    <input name="{{$tag}}.{{$index}}.{{$header}}" wire:model.lazy="{{$tag}}.{{$index}}.{{$header}}" type="text"
                        class="form-control">
                    <div class="form-text text-danger">{{$errors->first($tag.'.'. $index .'.'.$header)}}</div>
                </div>
            </td>
            @endforeach
        </tr>
        @endfor
    </tbody>
</table>
