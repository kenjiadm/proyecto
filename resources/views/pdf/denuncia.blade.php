@extends ('template.index')

@section('cuerpo')

<div class="container">
<p>
<b class="float-end">Sumilla: <i>INTERPONGO DENUNCIA PENAL</i></b>
</p>

<br>
<br>

<p>
<b>SEÑOR (A) FISCAL PROVINCIAL EN LO PENAL DE TURNO DE LIMA:</b>
</p>

<br>
<br>

<p class="col-8 float-end">
{{ $datos1['name'] }} {{ $datos1['lastname'] }} (1), identificado con DNI Nro. {{ $datos1['dni'] }} (2), con domicilio en {{ $datos1['direccion'] }}, {{ $datos1['distrito'] }}, {{ $datos1['provincia'] }} (3), ante usted me presento y atentamente digo:
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
Que, de conformidad con lo establecido por el artículo 190 del Código Penal, INTERPONGO DENUNCIA PENAL contra  {{ $datos2['nombre_denunciado'] }}(6)_ por la comisión del delito contra el patrimonio –Apropiación Ilícita.  La denuncia que presento se sustenta en los siguientes elementos:
<br>
<br>

<b>II.	HECHOS</b>
<br>
<br>
Con fecha ____{{ $datos2['fecha_entrega'] }}(5)____,  hice entrega ___{{ $datos2['respuesta'] }}(4)_ __a la persona de ___{{ $datos2['nombre_denunciado'] }}(6)___________ consistente / s en _____{{ $datos2['cantidad_bien_mueble'] }}____ {{ $datos2['bien_mueble'] }}____con un valor de __{{ $datos2['valor_bien_mueble'] }}_ {{ $datos2['moneda_bien_mueble'] }} _(8) y/o {{ $datos2['suma_dinero'] }} {{ $datos2['moneda_dinero'] }}__(7), entregado (s) en calidad de ____{{ $datos2['motivo'] }}(9)__.
<br><br>
{{ $datos2['recibo'] }}__(10)___ cuento con ____recibo y/o acta de entrega del bien (11){{ $datos2['recibo'] }}___.  Cuento con otra prueba que demuestre la entrega del bien___{{ $datos2['prueba_adicional'] }}(12), como el  ____(13)__{{ $datos2['detalle_prueba_adicional'] }}___ / ""__fotos_"". Se adjunta copia del / los documento / s.
<br><br>
Se ha enviado carta notarial al denunciado, la cual se adjunta (14), enviada el __{{ $datos2['fecha_envio_carta_notarial'] }}_(15)__,en la que  se requiere al denunciado la devolución del bien mueble / dinero (4).  He recibido una carta de respuesta (16) {{ $datos2['fecha_respuesta_envio_carta_notarial'] }}____de fecha 15 de agosto de 2020. Se adjunta carta_(17)_ 
<br>
<br>
<b>III.	FUNDAMENTOS DE DERECHO </b>
<br>
<br>
<b>Delito de Apropiación Ilícita</b>
<br>
<br>
El artículo 190 del Código Penal sanciona la conducta del que en su provecho o de terceros, indebidamente, se apropia ilícitamente de un bien mueble, suma de dinero o valor, que haya recibido en depósito, comisión, administración, u otro título semejante, que produzca la obligación de entregar, devolver, o hacer un uso determinado.
<br>
<br>
Para la configuración del delito de Apropiación Ilícita se requiere que se presenten los siguientes presupuestos del tipo objetivo:
<br>
<br>
</p>

a) Licitud de la Tenencia.
<br>
<br>
b) Autonomía en la disposición del bien por parte de quien lo recibe.
<br>
<br>
El tipo penal de Apropiación Ilícita requiere para su configuración que el sujeto activo del delito haya adquirido la tenencia del bien en forma física y de manera originalmente legítima , ya sea en depósito, comisión, administración u otro título semejante que establezca obligación de entregarlo, devolverlo o destinarlo a un fin concreto. 
<br>
<p class="ps-4">
a.	De lo anterior resulta que se requiere – en el delito de Apropiación Ilícita – que el bien, objeto de apropiación, se haya recibido por caminos lícitos para fin específico y que la conducta punible aparezca con posterioridad.
<br>
b.	Que el sujeto activo del delito cuente con autorización del propietario del bien para recibirlo, ya sea a condición de entregarlo, devolverlo o destinarlo a un fin concreto.
<br>
c.	Que se le haya requerido la devolución del bien / dinero por la vía notarial, a pesar de lo cual, no le devuelven dicho bien / suma de dinero.
<br>
d.	Esta situación que se da en el caso de autos, pues de la imputación de los hechos se colige que el hoy denunciado, en su condición recibió el bien en ___ _{{ $datos2['motivo'] }}__(9)______, y, a pesar del requerimiento efectuado mediante carta notarial para que proceda a la devolución del bien / dinero, no lo ha hecho. 
<br>
<br>
</p>
<p>
Adicionalmente se requiere para la configuración del delito de Apropiación Ilícita el elemento subjetivo, dolo, que consiste en actuar con el ánimo de apropiarse (animus rem sibi habendi) de un bien ajeno recibido por cualquier título que obligue a entregarlo, devolverlo o destinarlo a un fin determinado. En el presente caso el elemento subjetivo ha quedado configurado debido a que el denunciado conocía para qué estaban destinados, y que tenía la obligación de devolverlos.
<br>
<br>
En tal sentido, se ha acreditado la comisión del delito de Apropiación Ilícita, por lo que, SOLICITO a su Despacho que disponga el inicio de las investigaciones que correspondan.
<br>
<br>
<b>Por lo tanto:</b>
<br>
<br>
<b>Pido a usted, Señor / Señorita Fiscal:</b> se sirva tener en cuenta lo expuesto y abra investigación preliminar contra {{ $datos2['nombre_denunciado'] }}(6)___ por la comisión del delito de Apropiación Ilícita, primer párrafo del Art. 190 Código Penal.
<br>
<br>
<br>
Ofrezco como medios de prueba, los siguientes anexos:
<br>
a)	Copia del DNI. <br>
b)	Recibo y/o acta de entrega del bien (11) <br> 
c)	Testimonio de Juan Pérez y fotos (13) <br>
d)	Se adjunta carta notarial cursada al denunciado (14) <br>
e)	Se adjunta carta notarial remitida por el denunciado (17) <br>
<br>
<br>
<p>
_______, __________ de 202__
</p>
</div>
@endsection

