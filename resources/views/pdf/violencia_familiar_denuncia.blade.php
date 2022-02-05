@extends ('template.index')

@section('cuerpo')

<div class="container">
<p>
<b class="float-end">Sumilla: <i>INTERPONGO DENUNCIA PENAL POR DELITO DE VIOLENCIA FAMILIAR</i></b>
</p>

<br>
<br>
<br>
<br>

<p>
<b>
SEÑOR FISCAL DE TURNO DE LA FISCALIA PROVINCIAL PENAL
CORPORATIVA ESPECIALIZADA EN VIOLENCIA CONTRA LA MUJER E
INTEGRANTES DEL GRUPO FAMILIAR DE {{ strtoupper($datos2['respuesta11_distrito'])}}
,{{strtoupper($datos2['respuesta11_provincia'])}} 
</b>
</p>

<br>
<br>

<p class="col-8 float-end">
{{ $datos1['name'] }} {{ $datos1['lastname'] }} (1)
, con DNI N° {{ $datos1['dni'] }} (2)
, con domicilio real sito en  {{ $datos1['direccion'] }}, {{ $datos1['distrito'] }}, {{ $datos1['provincia'] }} (3)
, a Usted, atentamente, digo:
</p>

<br>
<br>
<br>
<br>
<br>

<p class="col-12">
    
<b>I.	PETITORIO</b>
<br>
<br>
Que, al amparo del artículo 5° literal a) de la Ley N° 30364, Ley para prevenir,
sancionar y erradicar la violencia contra las mujeres y los integrantes del grupo familiar,
concordante con el artículo 8° literal a) numeral 1 de la misma Ley, interpongo
denuncia penal contra {{$datos2['respuesta9_nombre']}} ({{$datos2['respuesta9_edad']}}) 
<br>
<br>
A efectos que se terminen los actos de violencia, SOLICITO a usted se sirva iniciar el
procedimiento que corresponda y se oficie a las autoridades competentes, a efectos que
se dispongan las medidas cautelares que correspondan.
Los hechos que motivan la presente denuncia penal, son los siguientes:
<br>
<br>

<b>II.	FUNDAMENTOS DE HECHO:</b>
<br>
<br>
El día ……{{date('d-m-Y' ,strtotime($datos2['respuesta3']))}}….
, la persona de …{{$datos2['respuesta8_nombre']}} ({{$datos2['respuesta8_edad']}})..
, ha sido víctima de …
@if (isset($datos2['respuesta4']))
@if (sizeof($datos2['respuesta4']) !== 0)
violencia física (
    @foreach ( $datos2['respuesta4'] as $dato )
        {{$dato}}, 
    @endforeach
)
@endif
@endif
…. 
/……… 
@if (isset($datos2['respuesta7']))
@if (sizeof($datos2['respuesta7']) !== 0)
y violencia psicológica (
    @foreach ( $datos2['respuesta7'] as $dato )
        {{$dato}}, 
    @endforeach
)
@endif
@endif
………. 
de parte de …{{$datos2['respuesta9_nombre']}} ({{$datos2['respuesta9_edad']}})…
, con quien tiene una relación de ……{{$datos2['respuesta10']}}……….

<br><br>
Los actos de violencia han ocurrido en ……….{{$datos2['respuesta11_direccion'],$datos2['respuesta11_distrito'],$datos2['respuesta11_provincia'] }}….
, de la siguiente manera: ………{{$datos2['respuesta12']}}……
<br><br>
El denunciante …
@if ($datos2['respuesta2'] === 'si' || $datos2['respuesta6'] === 'si' ) SI @else NO @endif
… es quien ha sufrido el acto de violencia.
<br>
<br>
<b>III.	FUNDAMENTO NORMATIVO.- </b>
<br>
<br>
El delito de lesiones se encuentra tipificado en nuestro código penal, de la siguiente
manera:
<br>
<br>
<b style="color: red; font-size: 15px">Artículo 121.- Lesiones graves</b>
<p style="font-size: 15px">
El que causa a otro daño grave en el cuerpo o en la salud física o mental, será reprimido<br>
con pena privativa de libertad no menor de cuatro ni mayor de ocho años.<br>
Se consideran lesiones graves:<br>
1. Las que ponen en peligro inminente la vida de la víctima.<br>
2. Las que mutilan un miembro u órgano principal del cuerpo o lo hacen impropio para<br>
su función, causan a una persona incapacidad para el trabajo, invalidez o anomalía<br>
psíquica permanente o la desfiguran de manera grave y permanente.<br>
3. Las que infieren cualquier otro daño a la integridad corporal, o a la salud física o<br>
mental de una persona que requiera veinte o más días de asistencia o descanso según<br>
prescripción facultativa, o se determina un nivel grave o muy grave de daño psíquico.<br>
4. La afectación psicológica generada como consecuencia de que el agente obligue a<br>
otro a presenciar cualquier modalidad de homicidio doloso, lesión dolosa o violación<br>
sexual, o pudiendo evitar esta situación no lo hubiera hecho.<br>
Cuando la víctima muere a consecuencia de la lesión y el agente pudo prever este<br>
resultado, la pena será no menor de seis ni mayor de doce años.<br>
En los supuestos 1, 2 y 3 del primer párrafo, la pena privativa de libertad será no menor<br>
de seis años ni mayor de doce años cuando concurra cualquiera de las siguientes<br>
circunstancias agravantes:<br>
1. La víctima es miembro de la Policía Nacional del Perú o de las Fuerzas Armadas,<br>
magistrado del Poder Judicial o del Ministerio Público, magistrado del Tribunal<br>
Constitucional, autoridad elegida por mandato popular, servidor civil o autoridad<br>
administrativa relacionada con el transporte, tránsito terrestre o los servicios<br>
complementarios relacionados con dichas materias y es lesionada en ejercicio de sus<br>
funciones o como consecuencia de ellas.<br>
2. La víctima es menor de edad, adulta mayor o tiene discapacidad y el agente se<br>
aprovecha de dicha condición.<br>
3. Para cometer el delito se hubiera utilizado cualquier tipo de arma, objeto contundente<br>
o instrumento que ponga en riesgo la vida de la víctima.<br>
4. El delito se hubiera realizado con ensañamiento o alevosía.<br>
5. La víctima es un profesional o técnico o auxiliar asistencial de la salud que desarrolla<br>
actividad asistencial y es lesionada a causa del ejercicio de sus labores en el ámbito<br>
público o privado.<br>
En este caso, si la muerte se produce como consecuencia de cualquiera de las agravantes<br>
del segundo párrafo, se aplica pena privativa de libertad no menor de quince ni mayor<br>
de veinte años.<br>
</p>
<br>
<br>
<b style="color: red; font-size: 15px">Artículo 121-A.- Formas agravadas. Lesiones graves cuando la víctima es menor
    de edad, de la tercera edad o persona con discapacidad</b>
<p style="font-size: 15px">
    En los casos previstos en la primera parte del artículo 121, cuando la víctima sea menor
    de edad, mayor de sesenta y cinco años o sufre discapacidad física o mental y el agente
    se aprovecha de dicha condición se aplica pena privativa de libertad no menor de seis ni
    mayor de doce años.<br>
    Cuando la víctima muere a consecuencia de la lesión y el agente pudo prever ese
    resultado, la pena será no menor de doce ni mayor de quince años.
</p>
<br>
<br>
<b style="color: red; font-size: 15px">Artículo 121-B.- Lesiones graves por violencia contra las mujeres e integrantes del
    grupo familiar</b>
<p style="font-size: 15px">
    En los supuestos previstos en el primer párrafo del artículo 121 se aplica pena privativa<br>
    de libertad no menor de seis ni mayor de doce años e inhabilitación conforme a los<br>
    numerales 5 y 11 del artículo 36 del presente Código y los artículos 75 y 77 del Código<br>
    de los Niños y Adolescentes, según corresponda, cuando:<br>
    1. La víctima es mujer y es lesionada por su condición de tal en cualquiera de los<br>
    contextos previstos en el primer párrafo del artículo 108-B.<br>
    2. La víctima se encuentra en estado de gestación.<br>
    3. La víctima es cónyuge; excónyuge; conviviente; exconviviente; padrastro; madrastra;<br>
    ascendiente o descendiente por consanguinidad, adopción o afinidad; pariente colateral<br>
    del cónyuge y conviviente hasta el cuarto grado de consanguinidad y segundo de<br>
    afinidad; habita en el mismo hogar, siempre que no medien relaciones contractuales o<br>
    laborales; o es con quien se ha procreado hijos en común, independientemente de que se<br>
    conviva o no al momento de producirse los actos de violencia, o la violencia se da en<br>
    cualquiera de los contextos de los numerales 1, 2 y 3 del primer párrafo del artículo<br>
    108-B.<br>
    4. La víctima mantiene cualquier tipo de relación de dependencia o subordinación sea<br>
    de autoridad, económica, cuidado, laboral o contractual y el agente se hubiera<br>
    aprovechado de esta situación.<br>
    5. Para cometer el delito se hubiera utilizado cualquier tipo de arma, objeto contundente<br>
    o instrumento que ponga en riesgo la vida de la víctima.<br>
    6. El delito se hubiera realizado en cualquiera de las circunstancias del artículo 108.<br>
    7. La afectación psicológica a la que se hace referencia en el numeral 4 del primer<br>
    párrafo del artículo 121, se causa a cualquier niña, niño o adolescente en contextos de<br>
    violencia familiar o de violación sexual.<br>
    8. Si el agente actúa en estado de ebriedad, con presencia de alcohol en la sangre en<br>
    proporción mayor de 0.25 gramos-litro, o bajo efecto de drogas tóxicas, estupefacientes,<br>
    sustancias psicotrópicas o sintéticas.<br>
    La pena será no menor de doce ni mayor de quince años cuando concurran dos o más<br>
    circunstancias agravantes.<br>
    Cuando la víctima muere a consecuencia de cualquiera de las agravantes y el agente<br>
    pudo prever ese resultado, la pena será no menor de quince ni mayor de veinte años.<br>
</p>
<br>
<br>
<b style="color: red; font-size: 15px">
    Artículo 122. Lesiones leves
</b>
<p style="font-size: 15px">
    1. El que causa a otro lesiones en el cuerpo o en la salud física o mental que requiera<br>
    más de diez y menos de veinte días de asistencia o descanso, según prescripción<br>
    facultativa, o nivel moderado de daño psíquico, será reprimido con pena privativa de<br>
    libertad no menor de dos ni mayor de cinco años.<br>
    2. La pena privativa de libertad será no menor de seis ni mayor de doce años si la<br>
    víctima muere como consecuencia de la lesión prevista en el párrafo precedente y el<br>
    agente pudo prever ese resultado.<br>
    3. La pena privativa de libertad será no menor de tres ni mayor de seis años e<br>
    inhabilitación conforme a los numerales 5 y 11 del artículo 36 del presente Código y los<br>
    artículos 75 y 77 del Código de los Niños y Adolescentes, según corresponda, cuando:<br>
    a. La víctima es miembro de la Policía Nacional del Perú o de las Fuerzas Armadas,<br>
    magistrado del Poder Judicial, del Ministerio Público o del Tribunal Constitucional o<br>
    autoridad elegida por mandato popular o servidor civil y es lesionada en el ejercicio de<br>
    sus funciones oficiales o como consecuencia de ellas.<br>
    b. La víctima es menor de edad, adulta mayor o tiene discapacidad y el agente se<br>
    aprovecha de dicha condición.<br>
    c. La víctima es mujer y es lesionada por su condición de tal, en cualquiera de los<br>
    contextos previstos en el primer párrafo del artículo 108-B.<br>
    d. La víctima se encontraba en estado de gestación.<br>
    e. La víctima es el cónyuge; excónyuge; conviviente; exconviviente; padrastro;<br>
    madrastra; ascendiente o descendiente por consanguinidad, adopción o afinidad;<br>
    pariente colateral del cónyuge y conviviente hasta el cuarto grado de consanguinidad y<br>
    segundo de afinidad; habita en el mismo hogar, siempre que no medien relaciones<br>
    contractuales o laborales; o es con quien se ha procreado hijos en común,<br>
    independientemente de que se conviva o no al momento de producirse los actos de<br>
    violencia, o la violencia se da en cualquiera de los contextos de los numerales 1, 2 y 3<br>
    del primer párrafo del artículo 108-B.<br>
    f. La víctima mantiene cualquier tipo de relación de dependencia o subordinación sea de<br>
    autoridad, económica, cuidado, laboral o contractual y el agente se hubiera aprovechado<br>
    de esta situación.<br>
    g. Para cometer el delito se hubiera utilizado cualquier tipo de arma, objeto contundente<br>
    o instrumento que ponga en riesgo la vida de la víctima.<br>
    h. El delito se hubiera realizado con ensañamiento o alevosía.<br>
    i. Si el agente actúa en estado de ebriedad, con presencia de alcohol en la sangre en<br>
    proporción mayor de 0.25 gramos-litro, o bajo efecto de drogas tóxicas, estupefacientes,<br>
    sustancias psicotrópicas o sintéticas.<br>
    j. La víctima es un profesional o técnico o auxiliar asistencial de la salud que desarrolla<br>
    actividad asistencial y es lesionada a causa del ejercicio de sus labores en el ámbito<br>
    público o privado.<br>
    4. La pena privativa de libertad será no menor de ocho ni mayor de catorce años si la<br>
    víctima muere como consecuencia de la lesión a que se refiere el párrafo 3 y el agente<br>
    pudo prever ese resultado.<br>
</p>
<br>
<br>
<b style="color: red; font-size: 15px">
Artículo 122-A.- Formas agravadas. Lesiones leves cuando la víctima es un menor
</b>
<p style="font-size: 15px">
En el caso previsto en la primera parte del artículo 122, cuando la víctima sea menor de <br>
catorce años, la pena es privativa de libertad no menor de tres ni mayor de seis años. <br>
Cuando el agente sea el tutor o responsable del menor, procede además su remoción del <br>
cargo según el numeral 2 del artículo 554 del Código Civil e inhabilitación conforme a <br>
lo dispuesto en el inciso 5 del artículo 36 del presente Código. <br>
Cuando la víctima muere a consecuencia de la lesión y el agente pudo prever ese <br>
resultado, la pena será no menor de cinco ni mayor de nueve años. <br>
</p>
<br>
<br>
<b style="color: red; font-size: 15px">
Artículo 122-B.- Agresiones en contra de las mujeres o integrantes del grupo
familiar
</b>
<p style="font-size: 15px">
El que de cualquier modo cause lesiones corporales que requieran menos de diez días de <br>
asistencia o descanso según prescripción facultativa, o algún tipo de afectación <br>
psicológica, cognitiva o conductual que no califique como daño psíquico a una mujer <br>
por su condición de tal o a integrantes del grupo familiar en cualquiera de los contextos <br>
previstos en el primer párrafo del artículo 108-B, será reprimido con pena privativa de <br>
libertad no menor de uno ni mayor de tres años e inhabilitación conforme a los <br>
numerales 5 y 11 del artículo 36 del presente Código y los artículos 75 y 77 del Código <br>
de los Niños y Adolescentes, según corresponda. <br>
La pena será no menor de dos ni mayor de tres años, cuando en los supuestos del primer <br>
párrafo se presenten las siguientes agravantes: <br>
1. Se utiliza cualquier tipo de arma, objeto contundente o instrumento que ponga en <br>
riesgo la vida de la víctima. <br>
2. El hecho se comete con ensañamiento o alevosía. <br>
3. La víctima se encuentra en estado de gestación. <br>
4. La víctima es menor de edad, adulta mayor o tiene discapacidad o si padeciera de <br>
enfermedad en estado terminal y el agente se aprovecha de dicha condición. <br>
5. Si en la agresión participan dos o más personas. <br>
6. Si se contraviene una medida de protección emitida por la autoridad competente. <br>
7. Si los actos se realizan en presencia de cualquier niña, niño o adolescente. <br>
Artículo 46-E. Circunstancia agravante cualificada por abuso de parentesco <br>
La pena es aumentada hasta en un tercio por encima del máximo legal fijado para el <br>
delito cuando el agente se haya aprovechado de su calidad de ascendiente o <br>
descendiente, natural o adoptivo, padrastro o madrastra, cónyuge o conviviente de la <br>
víctima. En este caso, la pena privativa de libertad no puede exceder los treinta y cinco <br>
años, salvo que el delito se encuentre reprimido con pena privativa de libertad <br>
indeterminada, en cuyo caso se aplica esta última. <br>
La agravante prevista en el primer párrafo es inaplicable cuando esté establecida como <br>
tal en la ley penal. <br>
</p>
<br>
<br>
<b style="color: red; font-size: 15px">
Artículo 124-B. Del daño psíquico y la afectación psicológica, cognitiva o
conductual
</b>
<p style="font-size: 15px">
El nivel del daño psíquico es determinado a través de un examen pericial o cualquier <br>
otro medio idóneo, con la siguiente equivalencia: <br>
A. Falta de lesiones leves: nivel leve de daño psíquico. <br>
B. Lesiones leves: nivel moderado de daño psíquico. <br>
C. Lesiones graves: nivel grave o muy grave de daño psíquico. <br>
La afectación psicológica, cognitiva o conductual, puede ser determinada a través de un <br>
examen pericial o cualquier otro elemento probatorio objetivo similar al que sea emitido <br>
por entidades públicas o privadas especializadas en la materia, sin someterse a la <br>
equivalencia del daño psíquico. <br>
</p>
<br>
<br>
<b>IV.- MEDIOS PROBATORIOS: EXAMEN DEL MÉDICO LEGISTA</b>
<br>
<br>
Pido a su Despacho que disponga la inmediata realización de un EXAMEN FÍSICO
MÉDICO LEGISTA que determine la situación física de la agraviada, así como un
EXAMEN PSICOLÓGICO MÉDICO LEGISTA, que nos permitan conocer cuál es la
situación de la SALUD FÍSICA y la SALUD MENTAL de la víctima.
<br>
<br>
<b>V.- ANEXOS:</b>
<br>
<br>
Adjunto como anexos los siguientes documentos:
<br>
<br>
1) Copia de mi DNI. <br>
@foreach ( $datos2['anexos'] as $anexo)
{{$loop->iteration + 1}}) {{$anexo}} <br>
@endforeach
<br>
<br>
<b>Por tanto:</b>
<br>
<br>
<b>Sírvase Usted, señor Fiscal Provincial,</b>
admitir esta denuncia, y disponer la realización
de las diligencias que correspondan.
<br>
<br>
<b style="text-decoration: underline">PRIMER OTROSÍ DIGO:</b> Adjunto copia de mi DNI.
<br><br>
<b style="text-decoration: underline">SEGUNDO OTROSÍ DIGO:</b> Se sirva poner estos hechos en conocimiento de los
JUZGADOS DE FAMILIA correspondientes, a efectos que, de conformidad con lo
estipulado por el artículo 16 de la Ley 30363, evalúen el caso y actúen conforme a ley,
otorgando las medidas de protección requeridas que sean necesarias para la situación de
la víctima. Asimismo, se pronuncie sobre las medidas cautelares que resguardarán las
pretensiones de alimentos, regímenes de visitas, tenencia, suspensión o extinción de la
patria potestad, liquidación de régimen patrimonial y otros aspectos conexos que sean
necesarios para garantizar el bienestar de las víctimas.
<br><br>
<b style="text-decoration: underline">TERCERO OTROSÍ DIGO:</b> A efectos de recibir notificaciones y coordinar las
diligencias dispuestas por su despacho, señalo los siguientes canales de comunicación:
<br><br>
d. Correo electrónico GMAIL:…
{{
$datos1['email']
}}
…. <br>
e. Domicilio:……
{{
$datos1['direccion'],
$datos1['distrito'],
$datos1['ciudad']    
}}
… <br>
f. Teléfono:……
{{
$datos1['celular']
}}
…. <br>
<br><br>
<p style="text-align: right; font-size: 12px">
    XXXX,..............de.........................del................
</p>
</p>
</div>
@endsection