@extends ('template.index')

@section('cuerpo')

<div x-data="form" class="container">
  <form class="m-4 p-4" action="{{url('denuncia3', $id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">1) ¿Ha sufrido USTED violencia fisica?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta2" value="si" id="rp2_opcion1">
        <label class="form-check-label" for="rp2_opcion1">
          Si
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta2" value="no" id="rp2_opcion2">
        <label class="form-check-label" for="rp2_opcion2">
          No
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">2) ¿Ha sufrido USTED violencia psicologica?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta6" value="si" id="rp6_opcion1">
        <label class="form-check-label" for="rp6_opcion1">
          Si
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta6" value="no" id="rp6_opcion2">
        <label class="form-check-label" for="rp6_opcion2">
          No
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">3) ¿Ha tomado conocimiento de un acto de violencia fisica a otra persona?</label>
      <div class="form-check">
        <input @click="toggleActive" class="form-check-input" type="radio" name="respuesta1" value="si"
          id="rp1_opcion1">
        <label class="form-check-label" for="rp1_opcion1">
          Si
        </label>
      </div>
      <div class="form-check">
        <input @click="toggleActive" class="form-check-input" type="radio" name="respuesta1" value="no"
          id="rp1_opcion2">
        <label class="form-check-label" for="rp1_opcion2">
          No
        </label>
      </div>
    </div>
    {{-- <template x-if="active1"> --}}
      <div x-show="active1" class="mb-3">
        <label class="form-label">3.1) He tomado conocimiento de actos de violencia física en mi condición de:</label>
        <div class="form-check">
          <input @click="toggleActive1" class="form-check-input" type="radio" name="respuesta1.1" value="a"
            id="rp1.1_opcion1">
          <label class="form-check-label" for="rp1.1_opcion1">
            Personal de Salud
          </label>
        </div>
        <div class="form-check">
          <input @click="toggleActive1" class="form-check-input" type="radio" name="respuesta1.1" value="b"
            id="rp1.1_opcion2">
          <label class="form-check-label" for="rp1.1_opcion2">
            Personal de Educación
          </label>
        </div>
        <div class="form-check">
          <input @click="toggleActive1" class="form-check-input" type="radio" name="respuesta1.1" value="c"
            id="rp1.1_opcion3">
          <label class="form-check-label" for="rp1.1_opcion3">
            Otro
          </label>
        </div>
      </div>
    {{-- </template> --}}
    <template x-if="active1a">
      <div class="mb-3">
        <label class="form-label">3.1.1) Precisar cargo y centro de salud en el que se desempeña</label>
        <div class="col-sm-10 col-lg-5">
          <div class="form-group row my-2 align-items-center">
            <label for="rp1.1.a_c" class="col-sm-5 col-form-label">Cargo :</label>
            <div class="col-sm-7">
              <input name="respuesta1.1.a_cargo" type="text" class="form-control" id="rp1.1.a_c">
            </div>
          </div>
          <div class="form-group row my-2 align-items-center">
            <label for="rp1.1.a_l" class="col-sm-5 col-form-label">Centro de Salud :</label>
            <div class="col-sm-7">
              <input name="respuesta1.1.a_lugar" type="text" class="form-control" id="rp1.1.a_l">
            </div>
          </div>
        </div>
      </div>
    </template>
    <template x-if="active1b">
      <div class="mb-3">
        <label class="form-label">3.1.1) Precisar cargo y centro educativo en el que se desempeña</label>
        <div class="col-sm-10 col-lg-5">
          <div class="form-group row my-2 align-items-center">
            <label for="rp1.1.b_c" class="col-sm-5 col-form-label">Cargo :</label>
            <div class="col-sm-7">
              <input name="respuesta1.1.b_cargo" type="text" class="form-control" id="rp1.1.b_c">
            </div>
          </div>
          <div class="form-group row my-2 align-items-center">
            <label for="rp1.1.b_l" class="col-sm-5 col-form-label">Centro Educativo :</label>
            <div class="col-sm-7">
              <input name="respuesta1.1.b_lugar" type="text" class="form-control" id="rp1.1.b_l">
            </div>
          </div>
        </div>
      </div>
    </template>
    <template x-if="active1c" class="mb-3">
      <div class="mb-3">
        <label class="form-label">3.1.1) Precisar la relación que mantiene con la víctima, que le permitió tomar
          conocimiento de los hechos que denuncia:</label>
        <div class="col-sm-10 col-lg-5">
          <div class="form-group row my-2 align-items-center">
            <label for="rp1.1.c_r" class="col-sm-5 col-form-label">Relación con la víctima :</label>
            <div class="col-sm-7">
              <input name="respuesta1.1.c_relacion" type="text" class="form-control" id="rp1.1.c_r">
            </div>
          </div>
        </div>
      </div>
    </template>
    <div class="mb-3">
      <label class="form-label">4) Fecha del acontecimiento:</label>
      <div class="col-sm-10 col-lg-5">
        <input type="date" class="form-control" name="respuesta3">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">5) ¿Qué tipo de violencia física ha recibido y/o presenciado?</label>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="Golpes, quemaduras, etc."
          id="rp4_opcion1">
        <label class="form-check-label" for="rp4_opcion1">
          Golpes, quemaduras, etc.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="violación o abuso sexual"
          id="rp4_opcion2">
        <label class="form-check-label" for="rp4_opcion2">
          violación o abuso sexual
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="tortura" id="rp4_opcion3">
        <label class="form-check-label" for="rp4_opcion3">
          tortura
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="trata de personas" id="rp4_opcion4">
        <label class="form-check-label" for="rp4_opcion4">
          trata de personas
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="prostitución forzada"
          id="rp4_opcion5">
        <label class="form-check-label" for="rp4_opcion5">
          prostitución forzada
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="secuestro" id="rp4_opcion6">
        <label class="form-check-label" for="rp4_opcion6">
          secuestro
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta4[]" value="otro" id="rp4_opcion7">
        <label class="form-check-label" for="rp4_opcion7">
          otro
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">6) ¿Ha tomado conocimiento de un acto de violencia psicologica a otra persona?</label>
      <div class="form-check">
        <input @click="toggleActive2" class="form-check-input" type="radio" name="respuesta5" value="si" id="rp5_opcion1">
        <label class="form-check-label" for="rp5_opcion1">
          Si
        </label>
      </div>
      <div class="form-check">
        <input @click="toggleActive2" class="form-check-input" type="radio" name="respuesta5" value="no" id="rp5_opcion2">
        <label class="form-check-label" for="rp5_opcion2">
          No
        </label>
      </div>
    </div>
    <template x-if="active2">
    <div class="mb-3">
      <label class="form-label">6.1) He tomado conocimiento de actos de violencia psicologica en mi condición
        de:</label>
      <div class="form-check">
        <input @click="toggleActive3" class="form-check-input" type="radio" name="respuesta5.1" value="a" id="rp5.1_opcion1">
        <label class="form-check-label" for="rp5.1_opcion1">
          Personal de Salud
        </label>
      </div>
      <div class="form-check">
        <input @click="toggleActive3" class="form-check-input" type="radio" name="respuesta5.1" value="b" id="rp5.1_opcion2">
        <label class="form-check-label" for="rp5.1_opcion2">
          Personal de Educación
        </label>
      </div>
      <div class="form-check">
        <input @click="toggleActive3" class="form-check-input" type="radio" name="respuesta5.1" value="c" id="rp5.1_opcion3">
        <label class="form-check-label" for="rp5.1_opcion3">
          Otro
        </label>
      </div>
    </div>
  </template>
  <template x-if="active2a">
    <div class="mb-3">
      <label class="form-label">6.1.1) Precisar cargo y centro de salud en el que se desempeña</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp5.1.a_c" class="col-sm-5 col-form-label">Cargo :</label>
          <div class="col-sm-7">
            <input name="respuesta5.1.a_cargo" type="text" class="form-control" id="rp5.1.a_c">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp5.1.a_l" class="col-sm-5 col-form-label">Centro de Salud :</label>
          <div class="col-sm-7">
            <input name="respuesta5.1.a_lugar" type="text" class="form-control" id="rp5.1.a_l">
          </div>
        </div>
      </div>
    </div>
  </template>
  <template x-if="active2b">
    <div class="mb-3">
      <label class="form-label">6.1.1) Precisar cargo y centro educativo en el que se desempeña</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp5.1.b_c" class="col-sm-5 col-form-label">Cargo :</label>
          <div class="col-sm-7">
            <input name="respuesta5.1.b_cargo" type="text" class="form-control" id="rp5.1.b_c">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp5.1.b_l" class="col-sm-5 col-form-label">Centro Educativo :</label>
          <div class="col-sm-7">
            <input name="respuesta5.1.b_lugar" type="text" class="form-control" id="rp5.1.b_l">
          </div>
        </div>
      </div>
    </div>
  </template>
    <template x-if="active2c">
    <div class="mb-3">
      <label class="form-label">6.1.1) Precisar la relación que mantiene con la víctima, que le permitió tomar
        conocimiento de los hechos que denuncia:</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp5.1.c_r" class="col-sm-5 col-form-label">Relación con la víctima :</label>
          <div class="col-sm-7">
            <input name="respuesta5.1.c_relacion" type="text" class="form-control" id="rp5.1.c_r">
          </div>
        </div>
      </div>
    </div>
  </template>
    <div class="mb-3">
      <label class="form-label">7) ¿Qué tipo de violencia psicológica ha recibido y/o presenciado?</label>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="Insultos" id="rp7_opcion1">
        <label class="form-check-label" for="rp7_opcion1">
          Insultos
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="ataques a la autoestima"
          id="rp7_opcion2">
        <label class="form-check-label" for="rp7_opcion2">
          ataques a la autoestima
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="amenazas" id="rp7_opcion3">
        <label class="form-check-label" for="rp7_opcion3">
          amenazas
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]"
          value="Coacción: Obligar a hacer algo bajo amenaza." id="rp7_opcion4">
        <label class="form-check-label" for="rp7_opcion4">
          Coacción: Obligar a hacer algo bajo amenaza.
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="Privación de la libertad"
          id="rp7_opcion5">
        <label class="form-check-label" for="rp7_opcion5">
          Privación de la libertad
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]"
          value="Económica(Control de su dinero, no recibe pensión de alimentos, etc)" id="rp7_opcion6">
        <label class="form-check-label" for="rp7_opcion6">
          Económica(Control de su dinero, no recibe pensión de alimentos, etc)
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="Acoso sexual" id="rp7_opcion7">
        <label class="form-check-label" for="rp7_opcion7">
          Acoso sexual
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="respuesta7[]" value="otro" id="rp7_opcion8">
        <label class="form-check-label" for="rp7_opcion8">
          otro
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">8) Precise el nombre, apellido y edad de la persona agraviada (De ser USTED, complete
        con
        sus datos)</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp8_n" class="col-sm-5 col-form-label">Nombre y Apellido :</label>
          <div class="col-sm-7">
            <input name="respuesta8_nombre" type="text" class="form-control" id="rp8_n">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp8_e" class="col-sm-5 col-form-label">Edad :</label>
          <div class="col-sm-7">
            <input name="respuesta8_edad" type="number" step="0" class="form-control" id="rp8_e">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">9) Precise el nombre, apellido y edad de la persona agresora</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp9_n" class="col-sm-5 col-form-label">Nombre y Apellido :</label>
          <div class="col-sm-7">
            <input name="respuesta9_nombre" type="text" class="form-control" id="rp9_n">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp9_e" class="col-sm-5 col-form-label">Edad :</label>
          <div class="col-sm-7">
            <input name="respuesta9_edad" type="number" step="0" class="form-control" id="rp9_e">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">10) ¿Qué relación tiene la persona agraviada con la persona agresora?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Cónyuges" id="rp10_opcion1">
        <label class="form-check-label" for="rp10_opcion1">
          Cónyuges
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Ex conyuges" id="rp10_opcion2">
        <label class="form-check-label" for="rp10_opcion2">
          Ex conyuges
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Convivientes" id="rp10_opcion3">
        <label class="form-check-label" for="rp10_opcion3">
          Convivientes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Ex convivientes" id="rp10_opcion4">
        <label class="form-check-label" for="rp10_opcion4">
          Ex convivientes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Pareja" id="rp10_opcion5">
        <label class="form-check-label" for="rp10_opcion5">
          Pareja
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Ex pareja" id="rp10_opcion6">
        <label class="form-check-label" for="rp10_opcion6">
          Ex pareja
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Madre / padre" id="rp10_opcion7">
        <label class="form-check-label" for="rp10_opcion7">
          Madre / padre
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Padrastro / madrastra" id="rp10_opcion8">
        <label class="form-check-label" for="rp10_opcion8">
          Padrastro / madrastra
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Hermano / a" id="rp10_opcion9">
        <label class="form-check-label" for="rp10_opcion9">
          Hermano / a
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10" value="Primo / a" id="rp10_opcion10">
        <label class="form-check-label" for="rp10_opcion10">
          Primo / a
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10"
          value="parientes colaterales de los cónyuges y convivientes hasta el cuarto grado de consanguinidad y segundo de afinidad"
          id="rp10_opcion11">
        <label class="form-check-label" for="rp10_opcion11">
          parientes colaterales de los cónyuges y convivientes hasta el cuarto grado de consanguinidad y segundo de
          afinidad
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10"
          value="quienes habitan en el mismo hogar, siempre que no medien relaciones contractuales o laborales"
          id="rp10_opcion12">
        <label class="form-check-label" for="rp10_opcion12">
          quienes habitan en el mismo hogar, siempre que no medien relaciones contractuales o laborales
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="respuesta10"
          value="quienes hayan procreado hijos en común, independientemente que convivan o no" id="rp10_opcion13">
        <label class="form-check-label" for="rp10_opcion13">
          quienes hayan procreado hijos en común, independientemente que convivan o no
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">11) Precise en qué lugar ocurrieron los hechos.</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-group row my-2 align-items-center">
          <label for="rp11_p" class="col-sm-5 col-form-label">Provincia :</label>
          <div class="col-sm-7">
            <input name="respuesta11_provincia" type="text" class="form-control" id="rp11_p">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp11_dis" class="col-sm-5 col-form-label">Distrito :</label>
          <div class="col-sm-7">
            <input name="respuesta11_distrito" type="text" class="form-control" id="rp11_dis">
          </div>
        </div>
        <div class="form-group row my-2 align-items-center">
          <label for="rp11_dir" class="col-sm-5 col-form-label">Dirección :</label>
          <div class="col-sm-7">
            <input name="respuesta11_direccion" type="text" class="form-control" id="rp11_dir">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">12) Precise cómo ocurrieron los hechos</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-text">Ejemplo: El día X me encontraba en mi domicilio, aproximadamente a las 9pm
          se presentó el padre de mis hijos, ingresó a mi domicilio sin mi autorización, me
          profirió insultos y me agredió físicamente, golpeándome el rostro con el puño.</div>
        <textarea class="my-2 form-control" name="respuesta12" id="rp12" cols="30" rows="4"></textarea>
      </div>
    </div>
    <div class="mb-3">
      <b class="form-label">Anexos:</b>
    </div>
    <div class="mb-3">
      <label class="form-label">Adjuntar copia de su DNI</label>
      <div class="col-sm-10 col-lg-5">
        <input type="file" class="form-control" name="archivo_dni">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">En caso quiera adjuntar otros anexos.</label>
      <div class="col-sm-10 col-lg-5">
        <div class="form-text">Ejemplo: fotografías de la relación que mantuvo con el / la denunciado /a, certificado de
          matrimonio, certificado de nacimiento de sus hijos, u otros documentos que demuestren la relación con el
          denunciado. O si cuenta con documentos / foto /filmación de lo que ocurrió el día de los hechos, dicha
          documentación debe adjuntarse a la denuncia.</div>
        <div class="form-group row my-2 pb-3 align-items-center">
          <label for="anexo1_nombre" class="col-sm-5 col-form-label">Documento que adjunta:</label>
          <div class="col-sm-7">
            <input name="anexo1_nombre" type="text" class="form-control" id="anexo1_nombre">
          </div>
          <label for="anexo1_archivo" class="col-sm-5 col-form-label">Documento:</label>
          <div class="col-sm-7">
            <input name="anexo1_archivo" type="file" class="form-control" id="anexo1_archivo">
          </div>
        </div>
        <div class="form-group row my-2 pb-3 align-items-center">
          <label for="anexo2_nombre" class="col-sm-5 col-form-label">Documento que adjunta:</label>
          <div class="col-sm-7">
            <input name="anexo2_nombre" type="text" class="form-control" id="anexo2_nombre">
          </div>
          <label for="anexo2_archivo" class="col-sm-5 col-form-label">Documento:</label>
          <div class="col-sm-7">
            <input name="anexo2_archivo" type="file" class="form-control" id="anexo2_archivo">
          </div>
        </div>
        {{-- <div class="form-group row my-2 pb-3 align-items-center">
          <label for="anexo3_nombre" class="col-sm-5 col-form-label">Documento que adjunta:</label>
          <div class="col-sm-7">
            <input name="anexo3_nombre" type="text" class="form-control" id="anexo3_nombre">
          </div>
          <label for="anexo3_archivo" class="col-sm-5 col-form-label">Documento:</label>
          <div class="col-sm-7">
            <input name="anexo3_archivo" type="file" class="form-control" id="anexo3_archivo">
          </div>
        </div> --}}
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Crear denuncia</button>
  </form>
</div>
@endsection
@section('js')
<script>
  document.addEventListener('alpine:init', () => {
        let inputValue1 = document.querySelector('input[name="respuesta1"]:checked')?.value;
        let inputValue1option = document.querySelector('input[name="respuesta1.1"]:checked')?.value;
        let inputValue2 = document.querySelector('input[name="respuesta5"]:checked')?.value;
        let inputValue2option = document.querySelector('input[name="respuesta5.1"]:checked')?.value;

        Alpine.data('form', () => ({
            active1: false,
            active1a:false,
            active1b:false,
            active1c:false,
            active2: false,
            active2a:false,
            active2b:false,
            active2c:false,

            init(){
              this.active1 = inputValue1 === 'si' ? true : false;
              if (this.active1 === false) {
                this.active1a = false;
                this.active1b = false;
                this.active1c = false;
              } else {
                this.active1a = inputValue1option === 'a' ? true : false;
                this.active1b = inputValue1option === 'b' ? true : false;
                this.active1c = inputValue1option === 'c' ? true : false;
              }
              this.active2 = inputValue2 === 'si' ? true : false;
              if (this.active2 === false) {
                this.active2a = false;
                this.active2b = false;
                this.active2c = false;
              } else {
                this.active2a = inputValue2option === 'a' ? true : false;
                this.active2b = inputValue2option === 'b' ? true : false;
                this.active2c = inputValue2option === 'c' ? true : false;
              }
            },

            toggleActive() {
              let inputValue = document.querySelector('input[name="respuesta1"]:checked')?.value;
              this.active1 = inputValue === 'si' ? true : false;
              this.toggleActive1();
            },

            toggleActive1() {
              let inputValue = document.querySelector('input[name="respuesta1.1"]:checked')?.value;
              if (this.active1 === false) {
                this.active1a = false;
                this.active1b = false;
                this.active1c = false;
              } else {
                this.active1a = inputValue === 'a' ? true : false;
                this.active1b = inputValue === 'b' ? true : false;
                this.active1c = inputValue === 'c' ? true : false;
              }
            },

            toggleActive2() {
              let inputValue = document.querySelector('input[name="respuesta5"]:checked')?.value;
              this.active2 = inputValue === 'si' ? true : false;
              this.toggleActive3();
            },

            toggleActive3() {
              let inputValue = document.querySelector('input[name="respuesta5.1"]:checked')?.value;
              if (this.active2 === false) {
                this.active2a = false;
                this.active2b = false;
                this.active2c = false;
              } else {
                this.active2a = inputValue === 'a' ? true : false;
                this.active2b = inputValue === 'b' ? true : false;
                this.active2c = inputValue === 'c' ? true : false;
              }
            }
        }))
    })
</script>
@endsection