@props(['respuestas'])
<div>
    <div class="m-4 p-4">
        @if (!empty($respuestas['advertensia']))
        <div class="form-text text-danger">{{$respuestas['advertensia']}}</div>
        @endif
        <div class="mb-3">
            <label class="form-label">1) ¿Ha sufrido USTED violencia fisica?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta2" wire:model.lazy="respuesta2" value="si"
                    id="rp2_opcion1">
                <label class="form-check-label" for="rp2_opcion1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta2" wire:model.lazy="respuesta2" value="no"
                    id="rp2_opcion2">
                <label class="form-check-label" for="rp2_opcion2">
                    No
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta2') {{$message}} @enderror</div>
        </div>
        <div class="mb-3">
            <label class="form-label">2) ¿Ha sufrido USTED violencia psicologica?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta6" wire:model.lazy="respuesta6" value="si"
                    id="rp6_opcion1">
                <label class="form-check-label" for="rp6_opcion1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta6" wire:model.lazy="respuesta6" value="no"
                    id="rp6_opcion2">
                <label class="form-check-label" for="rp6_opcion2">
                    No
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta6') {{$message}} @enderror</div>
        </div>
        <div class="mb-3">
            <label class="form-label">3) ¿Ha tomado conocimiento de un acto de violencia fisica contra otra
                persona?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1" wire:model.lazy="respuesta1" value="si"
                    id="rp1_opcion1">
                <label class="form-check-label" for="rp1_opcion1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1" wire:model.lazy="respuesta1" value="no"
                    id="rp1_opcion2">
                <label class="form-check-label" for="rp1_opcion2">
                    No
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta1') {{$message}} @enderror</div>
        </div>
        @if ($respuestas['respuesta1'] === 'si')
        <div class="mb-3">
            <label class="form-label">3.1) He tomado conocimiento de actos de violencia física en mi condición
                de:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1_1" wire:model.lazy="respuesta1_1"
                    value="a" id="rp1_1_opcion1">
                <label class="form-check-label" for="rp1_1_opcion1">
                    Personal de Salud
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1_1" wire:model.lazy="respuesta1_1"
                    value="b" id="rp1_1_opcion2">
                <label class="form-check-label" for="rp1_1_opcion2">
                    Personal de Educación
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1_1" wire:model.lazy="respuesta1_1"
                    value="c" id="rp1_1_opcion3">
                <label class="form-check-label" for="rp1_1_opcion3">
                    Relación de Parentesco
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta1_1" wire:model.lazy="respuesta1_1"
                    value="d" id="rp1_1_opcion4">
                <label class="form-check-label" for="rp1_1_opcion4">
                    Otro
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta1_1') {{$message}} @enderror</div>
        </div>
        @if ($respuestas['respuesta1_1'] === 'a')
        <div class="mb-3">
            <label class="form-label">3.1.1) Precisar cargo y centro de salud en el que se desempeña</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_a_c" class="col-5 col-form-label">Cargo :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_a_cargo" wire:model.lazy="respuesta1_1_a_cargo" type="text"
                            class="form-control" id="rp1_1_a_c">
                        <div class="form-text text-danger">@error('respuesta1_1_a_cargo') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_a_l" class="col-5 col-form-label">Centro de Salud :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_a_lugar" wire:model.lazy="respuesta1_1_a_lugar" type="text"
                            class="form-control" id="rp1_1_a_l">
                        <div class="form-text text-danger">@error('respuesta1_1_a_lugar') {{$message}} @enderror</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta1_1'] === 'b')
        <div class="mb-3">
            <label class="form-label">3.1.1) Precisar cargo y centro educativo en el que se desempeña</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_b_c" class="col-5 col-form-label">Cargo :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_b_cargo" wire:model.lazy="respuesta1_1_b_cargo" type="text"
                            class="form-control" id="rp1_1_b_c">
                        <div class="form-text text-danger">@error('respuesta1_1_b_cargo') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_b_l" class="col-5 col-form-label">Centro Educativo :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_b_lugar" wire:model.lazy="respuesta1_1_b_lugar" type="text"
                            class="form-control" id="rp1_1_b_l">
                        <div class="form-text text-danger">@error('respuesta1_1_b_lugar') {{$message}} @enderror</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta1_1'] === 'c')
        <div class="mb-3">
            <label class="form-label">3.1.1) Precisar el parentesco que mantiene con la víctima, que le permitió tomar
                conocimiento de los hechos que denuncia:</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_c_r" class="col-5 col-form-label">Parentesco con la víctima :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_c_relacion" wire:model.lazy="respuesta1_1_c_relacion" type="text"
                            class="form-control" id="rp1_1_c_r">
                        <div class="form-text text-danger">@error('respuesta1_1_c_relacion') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta1_1'] === 'd')
        <div class="mb-3">
            <label class="form-label">3.1.1) Precisar la relación que mantiene con la víctima, que le permitió tomar
                conocimiento de los hechos que denuncia:</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp1_1_d_r" class="col-5 col-form-label">Relación con la víctima :</label>
                    <div class="col-7">
                        <input name="respuesta1_1_c_relacion" wire:model.lazy="respuesta1_1_d_relacion" type="text"
                            class="form-control" id="rp1_1_d_r">
                        <div class="form-text text-danger">@error('respuesta1_1_d_relacion') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        @if ($respuestas['respuesta2'] === 'si' || $respuestas['respuesta1'] === 'si')
        <div class="mb-3">
            <label class="form-label">4) ¿Qué tipo de violencia física ha recibido y/o presenciado?</label>
            <div class="form-text text-danger">@error('respuesta4') {{$message}} @enderror</div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="Golpes" id="rp4_opcion1">
                <label class="form-check-label" for="rp4_opcion1">
                    Golpes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="Quemaduras" id="rp4_opcion2">
                <label class="form-check-label" for="rp4_opcion2">
                    Quemaduras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="violación o abuso sexual" id="rp4_opcion3">
                <label class="form-check-label" for="rp4_opcion3">
                    Violación o abuso sexual
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="tortura" id="rp4_opcion4">
                <label class="form-check-label" for="rp4_opcion4">
                    Tortura
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="trata de personas" id="rp4_opcion5">
                <label class="form-check-label" for="rp4_opcion5">
                    Trata de personas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="prostitución forzada" id="rp4_opcion6">
                <label class="form-check-label" for="rp4_opcion6">
                    Prostitución forzada
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="secuestro" id="rp4_opcion7">
                <label class="form-check-label" for="rp4_opcion7">
                    Secuestro
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta4[]" wire:model.lazy="respuesta4"
                    value="otro" id="rp4_opcion8">
                <label class="form-check-label d-flex" for="rp4_opcion8">
                    Otro
                    @if (in_array('otro',$respuestas['respuesta4']))
                    <div class="d-flex flex-column mx-5">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" wire:model.lazy="rp4otro">
                        </div>
                        <div class="form-text text-danger">@error('rp4otro') {{$message}} @enderror</div>
                    </div>
                    @endif
                </label>
            </div>
        </div>
        @endif
        <div class="mb-3">
            <label class="form-label">5) ¿Ha tomado conocimiento de un acto de violencia psicologica contra otra
                persona?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5" wire:model.lazy="respuesta5" value="si"
                    id="rp5_opcion1">
                <label class="form-check-label" for="rp5_opcion1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5" wire:model.lazy="respuesta5" value="no"
                    id="rp5_opcion2">
                <label class="form-check-label" for="rp5_opcion2">
                    No
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta5') {{$message}} @enderror</div>
        </div>
        @if ($respuestas['respuesta5'] === 'si')
        <div class="mb-3">
            <label class="form-label">5.1) He tomado conocimiento de actos de violencia psicologica en mi condición
                de:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5_1" wire:model.lazy="respuesta5_1"
                    value="a" id="rp5_1_opcion1">
                <label class="form-check-label" for="rp5_1_opcion1">
                    Personal de Salud
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5_1" wire:model.lazy="respuesta5_1"
                    value="b" id="rp5_1_opcion2">
                <label class="form-check-label" for="rp5_1_opcion2">
                    Personal de Educación
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5_1" wire:model.lazy="respuesta5_1"
                    value="c" id="rp5_1_opcion3">
                <label class="form-check-label" for="rp5_1_opcion3">
                    Relación de Parentesco
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta5_1" wire:model.lazy="respuesta5_1"
                    value="d" id="rp5_1_opcion4">
                <label class="form-check-label" for="rp5_1_opcion4">
                    Otro
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta5_1') {{$message}} @enderror</div>
        </div>
        @endif
        @if ($respuestas['respuesta5_1'] === 'a')
        <div class="mb-3">
            <label class="form-label">5.1.1) Precisar cargo y centro de salud en el que se desempeña</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_a_c" class="col-5 col-form-label">Cargo :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_a_cargo" wire:model.lazy="respuesta5_1_a_cargo" type="text"
                            class="form-control" id="rp5_1_a_c">
                        <div class="form-text text-danger">@error('respuesta5_1_a_cargo') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_a_l" class="col-5 col-form-label">Centro de Salud :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_a_lugar" wire:model.lazy="respuesta5_1_a_lugar" type="text"
                            class="form-control" id="rp5_1_a_l">
                        <div class="form-text text-danger">@error('respuesta5_1_a_lugar') {{$message}} @enderror</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta5_1'] === 'b')
        <div class="mb-3">
            <label class="form-label">5.1.1) Precisar cargo y centro educativo en el que se desempeña</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_b_c" class="col-5 col-form-label">Cargo :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_b_cargo" wire:model.lazy="respuesta5_1_b_cargo" type="text"
                            class="form-control" id="rp5_1_b_c">
                        <div class="form-text text-danger">@error('respuesta5_1_b_cargo') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_b_l" class="col-5 col-form-label">Centro Educativo :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_b_lugar" wire:model.lazy="respuesta5_1_b_lugar" type="text"
                            class="form-control" id="rp5_1_b_l">
                        <div class="form-text text-danger">@error('respuesta5_1_b_lugar') {{$message}} @enderror</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta5_1'] === 'c')
        <div class="mb-3">
            <label class="form-label">5.1.1) Precisar la relación de parentesco que mantiene con la víctima, que le
                permitió tomar
                conocimiento de los hechos que denuncia:</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_c_r" class="col-5 col-form-label">Parentesco con la víctima :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_c_relacion" wire:model.lazy="respuesta5_1_c_relacion" type="text"
                            class="form-control" id="rp5_1_c_r">
                        <div class="form-text text-danger">@error('respuesta5_1_c_relacion') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta5_1'] === 'd')
        <div class="mb-3">
            <label class="form-label">5.1.1) Precisar la relación que mantiene con la víctima, que le permitió tomar
                conocimiento de los hechos que denuncia:</label>
            <div class="col-10 ">
                <div class="form-group row my-2 align-items-center">
                    <label for="rp5_1_d_r" class="col-5 col-form-label">Relación con la víctima :</label>
                    <div class="col-7">
                        <input name="respuesta5_1_d_relacion" wire:model.lazy="respuesta5_1_d_relacion" type="text"
                            class="form-control" id="rp5_1_d_r">
                        <div class="form-text text-danger">@error('respuesta5_1_d_relacion') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta5'] === 'si' || $respuestas['respuesta6'] === 'si')
        <div class="mb-3">
            <label class="form-label">6) ¿Qué tipo de violencia psicológica ha recibido y/o presenciado?</label>
            <div class="form-text text-danger">@error('respuesta7') {{$message}} @enderror</div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="Insultos" id="rp7_opcion1">
                <label class="form-check-label" for="rp7_opcion1">
                    Insultos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="ataques a la autoestima" id="rp7_opcion2">
                <label class="form-check-label" for="rp7_opcion2">
                    ataques a la autoestima
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="amenazas" id="rp7_opcion3">
                <label class="form-check-label" for="rp7_opcion3">
                    amenazas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="Coacción: Obligar a hacer algo bajo amenaza." id="rp7_opcion4">
                <label class="form-check-label" for="rp7_opcion4">
                    Coacción: Obligar a hacer algo bajo amenaza.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="Privación de la libertad" id="rp7_opcion5">
                <label class="form-check-label" for="rp7_opcion5">
                    Privación de la libertad
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="Económica(Control de su dinero, no recibe pensión de alimentos, etc)" id="rp7_opcion6">
                <label class="form-check-label" for="rp7_opcion6">
                    Económica(Control de su dinero, no recibe pensión de alimentos, etc)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="Acoso sexual" id="rp7_opcion7">
                <label class="form-check-label" for="rp7_opcion7">
                    Acoso sexual
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="respuesta7[]" wire:model.lazy="respuesta7"
                    value="otro" id="rp7_opcion8">
                <label class="form-check-label d-flex" for="rp7_opcion8">
                    Otro
                    @if (in_array('otro',$respuestas['respuesta7']))
                    <div class="d-flex flex-column mx-5">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" wire:model.lazy="rp7otro">
                        </div>
                        <div class="form-text text-danger">@error('rp7otro') {{$message}} @enderror</div>
                    </div>
                    @endif
                </label>
            </div>
        </div>
        @endif
        @if ($respuestas['respuesta5'] === 'si' ||
        $respuestas['respuesta6'] === 'si' ||
        $respuestas['respuesta2'] === 'si' ||
        $respuestas['respuesta1'] === 'si')
        <div class="mb-3">
            <label class="form-label">7) Fecha de la agresion o de inicio de las agresiones:</label>
            <div class="col-10 ">
                <input type="date" class="form-control" name="respuesta3" wire:model.lazy="respuesta3">
                <div class="form-text text-danger">@error('respuesta3') {{$message}} @enderror</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">8) Precise el nombre, apellido y edad de la persona o personas agraviadas 
                (De ser USTED, complete con sus datos) </label>
            <div class="col-10 ">
                {{$agredidos}}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">9) Conoce el nombre, apellidos y edad de la persona agresora</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta9" wire:model.lazy="respuesta9" value="si"
                    id="rp9_opcion1">
                <label class="form-check-label" for="rp9_opcion1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta9" wire:model.lazy="respuesta9" value="no"
                    id="rp9_opcion2">
                <label class="form-check-label" for="rp9_opcion2">
                    No
                </label>
            </div>
            <div class="form-text text-danger">@error('respuesta9') {{$message}} @enderror</div>
        </div>
        @if ($respuestas['respuesta9'] === 'si')
        <div class="mb-3">
            <label class="form-label">9.1) Precise el nombre, apellido y edad de la persona o personas agresoras</label>
            <div class="col-10 ">
                {{$agresores}}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">9.2) ¿Qué relación tiene la persona agraviada con la persona agresora?</label>
            <div class="form-text text-danger">@error('respuesta10') {{$message}} @enderror</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Cónyuges" id="rp10_opcion1">
                <label class="form-check-label" for="rp10_opcion1">
                    Cónyuges
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Ex conyuges" id="rp10_opcion2">
                <label class="form-check-label" for="rp10_opcion2">
                    Ex conyuges
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Convivientes" id="rp10_opcion3">
                <label class="form-check-label" for="rp10_opcion3">
                    Convivientes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Ex convivientes" id="rp10_opcion4">
                <label class="form-check-label" for="rp10_opcion4">
                    Ex convivientes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Pareja" id="rp10_opcion5">
                <label class="form-check-label" for="rp10_opcion5">
                    Pareja
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Ex pareja" id="rp10_opcion6">
                <label class="form-check-label" for="rp10_opcion6">
                    Ex pareja
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Madre / padre" id="rp10_opcion7">
                <label class="form-check-label" for="rp10_opcion7">
                    Madre / padre
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Padrastro / madrastra" id="rp10_opcion8">
                <label class="form-check-label" for="rp10_opcion8">
                    Padrastro / madrastra
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Hermano / a" id="rp10_opcion9">
                <label class="form-check-label" for="rp10_opcion9">
                    Hermano / a
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="Primo / a" id="rp10_opcion10">
                <label class="form-check-label" for="rp10_opcion10">
                    Primo / a
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="parientes colaterales de los cónyuges y convivientes hasta el cuarto grado de consanguinidad y segundo de afinidad"
                    id="rp10_opcion11">
                <label class="form-check-label" for="rp10_opcion11">
                    parientes colaterales de los cónyuges y convivientes hasta el cuarto grado de consanguinidad y
                    segundo de
                    afinidad
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="quienes habitan en el mismo hogar, siempre que no medien relaciones contractuales o laborales"
                    id="rp10_opcion12">
                <label class="form-check-label" for="rp10_opcion12">
                    quienes habitan en el mismo hogar, siempre que no medien relaciones contractuales o laborales
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="respuesta10" wire:model.lazy="respuesta10"
                    value="quienes hayan procreado hijos en común, independientemente que convivan o no"
                    id="rp10_opcion13">
                <label class="form-check-label" for="rp10_opcion13">
                    quienes hayan procreado hijos en común, independientemente que convivan o no
                </label>
            </div>
        </div>
        @endif
        <div class="mb-3">
            <label class="form-label">10) Precise en qué lugar o lugares ocurrieron los hechos.</label>
            <div class="col-10 ">
                {{$lugares}}
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">11) Precise cómo ocurrieron los hechos</label>
            <div class="col-10 ">
                <div class="form-text">
                    Ejemplo 1: El día 4 de mayo me encontraba en mi domicilio, aproximadamente a las 9pm
                    se presentó el padre de mis hijos, ingresó a mi domicilio sin mi autorización, me
                    profirió insultos y me agredió físicamente, golpeándome el rostro con el puño.
                    <br><br>
                    Ejemplo 2: El día 10 de diciembre me encontraba en mi domicilio, cuando presencie al esposo de mi
                    vecina, la estaba esperando en la puerta de su casa y cuando ella llego la agredió con puños,
                    patadas e insultos.
                </div>
                <textarea class="my-2 form-control" name="respuesta12" wire:model.lazy="respuesta12" id="rp12" cols="30"
                    rows="4"></textarea>
                <div class="form-text text-danger">@error('respuesta12') {{$message}} @enderror</div>
            </div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" wire:model.lazy='confirmacion_anexos'
              name="confirmacion_anexos">
            <label class="form-check-label">Me comprometo a llevar los documentos que sustentan la presente de forma
              fisica
              al despacho</label>
        </div>
        @endif
    </div>
</div>