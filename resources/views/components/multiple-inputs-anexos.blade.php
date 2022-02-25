@props([
    'anexos',
    'errors'
])
@for ($index = 0; $index < count($anexos); $index++)
<div class="form-group row my-2 pb-3 align-items-center">
    <label for="anexo_nombre{{$index}}" class="col-5 col-form-label">Documento que adjunta:</label>
    <div class="col-6">
        <input name="anexo_nombre{{$index}}" wire:key="anexo-{{$index}}" wire:model.lazy="anexo_nombre.{{$index}}" type="text" class="form-control"
            id="anexo_nombre{{$index}}">
        <div class="form-text text-danger">{{$errors->first('anexo_nombre.'.$index)}}</div>
    </div>
    <div class="col-1">
        <a style="cursor: pointer" wire:click='decreaseAnexos({{$index}})'>
            <i style="font-size: 1.5rem; color:red" class="fas fa-minus"></i>
        </a>
    </div>
</div>
@endfor
