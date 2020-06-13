@extends('layaout')

@section('title')
Clientes

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Persona')</h1><br>
    <a href=" {{ route('persona.create') }} " class="btn btn-primary">Nuevo Cliente</a>
    {{-- @if ($errors->any())
@foreach($errors->all() as $error)
            {{ $error }}<br>
    @endforeach
    @endif--}}
</div>

<div class="row justify-content-md-center">
    <table class="table table-responsive table">
        <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Complemento</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Direecion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($persona as $personaitem)
                    <td>{{ $personaitem->ci }}</td>
                    <td>{{ $personaitem->complemento }}</td>
                    <td>{{ $personaitem->nombre }}</td>
                    <td>{{ $personaitem->direccion }}</td>
                    <td>{{ $personaitem->telefono }}</td>
                    <td>{{ $personaitem->correo }}</td>
                    <td>{{ $personaitem->fechaNacimiento }}</td>
                    <td>{{ $personaitem->paisNacimiento }}</td>
                    <td>
                        <a href="{{ route('persona.edit', $personaitem) }}"
                            class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                        <a href=""
                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    </td>
            </tr>
        @empty
            <span>No hay datos disponibles</span>
            @endforelse
        </tbody>
    </table>
</div>


<!-- MODAL DE ELIMINADO LOGICO-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Elimnar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('persona.destroy', $personaitem) }}">
                @csrf @method('DELETE')
                <div class="modal-body">
                    ¿Estas seguro que deseas elimar la persona?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- FINAL DEL MODAL DE ELIMINADO LOGICO-->



{{-- <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('usuario') }}">
@csrf
<div class="row">
    <div class="form-group col">
        <label for="ci">Numero de CI/DNI</label>
        <input type="number" name="ci" class="form-control @error('ci') is-invalid @enderror "
            value="{{ old('ci') }}">
        {!! $errors->first('ci', '<small>:message</small><br>') !!}
    </div>
    <div class="form-group col">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento" placeholder="OPCIONAL" class="form-control"
            value="{{ old('complemento') }}">
        {!! $errors->first('complemento', '<small>:message</small><br>') !!}
    </div>
</div>
<div class="form-group">
    <label for="nombre">Nombre Completo</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre') }}">
    {!! $errors->first('nombre', '<small>:message</small><br>') !!}
</div>
<div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
        value="{{ old('direccion') }}">
    {!! $errors->first('direccion', '<small>:message</small><br>') !!}
</div>
<div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror "
        value="{{ old('telefono') }}">
    {!! $errors->first('telefono', '<small>:message</small><br>') !!}
</div>
<div class="form-group">
    <label for="email">Correo Electronico</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') }}">
    {!! $errors->first('email', '<small>:message</small><br>') !!}
</div>
<div class="form-group">
    <label for="fechaNacimiento">Fecha de Nacimiento</label>
    <input type="date" name="fechaNacimiento" class="form-control @error('fechaNacimiento') is-invalid @enderror"
        value="{{ old('fechaNacimiento') }}">
    {!! $errors->first('fechaNacimiento', '<small>:message</small><br>') !!}
</div>
<div class="form-group">
    <label for="nacionalidad">Nacionalidad</label>
    <select class="form-control @error('nacionalidad') is-invalid @enderror" name="nacionalidad">
        <option value="">Seleccionar Opcion</option>
        <option value="Afganistán">Afganistán</option>
        <option value="Albania">Albania</option>
        <option value="Alemania">Alemania</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguila">Anguila</option>
        <option value="Antártida">Antártida</option>
        <option value="Antigua y Barbuda">Antigua y Barbuda</option>
        <option value="Antillas holandesas">Antillas holandesas</option>
        <option value="Arabia Saudí">Arabia Saudí</option>
        <option value="Argelia">Argelia</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaiyán">Azerbaiyán</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrein">Bahrein</option>
        <option value="Bangladesh" id="BD">Bangladesh</option>
        <option value="Barbados" id="BB">Barbados</option>
        <option value="Bélgica" id="BE">Bélgica</option>
        <option value="Belice" id="BZ">Belice</option>
        <option value="Benín" id="BJ">Benín</option>
        <option value="Bermudas" id="BM">Bermudas</option>
        <option value="Bhután" id="BT">Bhután</option>
        <option value="Bielorrusia" id="BY">Bielorrusia</option>
        <option value="Birmania" id="MM">Birmania</option>
        <option value="Bolivia" id="BO">Bolivia</option>
        <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
        <option value="Botsuana" id="BW">Botsuana</option>
        <option value="Brasil" id="BR">Brasil</option>
        <option value="Brunei" id="BN">Brunei</option>
        <option value="Bulgaria" id="BG">Bulgaria</option>
        <option value="Burkina Faso" id="BF">Burkina Faso</option>
        <option value="Burundi" id="BI">Burundi</option>
        <option value="Cabo Verde" id="CV">Cabo Verde</option>
        <option value="Camboya" id="KH">Camboya</option>
        <option value="Camerún" id="CM">Camerún</option>
        <option value="Canadá" id="CA">Canadá</option>
        <option value="Chad" id="TD">Chad</option>
        <option value="Chile" id="CL">Chile</option>
        <option value="China" id="CN">China</option>
        <option value="Chipre" id="CY">Chipre</option>
        <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
        <option value="Colombia" id="CO">Colombia</option>
        <option value="Comores" id="KM">Comores</option>
        <option value="Congo" id="CG">Congo</option>
        <option value="Corea" id="KR">Corea</option>
        <option value="Corea del Norte" id="KP">Corea del Norte</option>
        <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
        <option value="Costa Rica" id="CR">Costa Rica</option>
        <option value="Croacia" id="HR">Croacia</option>
        <option value="Cuba" id="CU">Cuba</option>
        <option value="Dinamarca" id="DK">Dinamarca</option>
        <option value="Djibouri" id="DJ">Djibouri</option>
        <option value="Dominica" id="DM">Dominica</option>
        <option value="Ecuador" id="EC">Ecuador</option>
        <option value="Egipto" id="EG">Egipto</option>
        <option value="El Salvador" id="SV">El Salvador</option>
        <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
        <option value="Eritrea" id="ER">Eritrea</option>
        <option value="Eslovaquia" id="SK">Eslovaquia</option>
        <option value="Eslovenia" id="SI">Eslovenia</option>
        <option value="España" id="ES">España</option>
        <option value="Estados Unidos" id="US">Estados Unidos</option>
        <option value="Estonia" id="EE">Estonia</option>
        <option value="Etiopia">Etiopía</option>
        <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
        <option value="Filipinas" id="PH">Filipinas</option>
        <option value="Finlandia" id="FI">Finlandia</option>
        <option value="Francia" id="FR">Francia</option>
        <option value="Gabón" id="GA">Gabón</option>
        <option value="Gambia" id="GM">Gambia</option>
        <option value="Georgia" id="GE">Georgia</option>
        <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del
            Sur</option>
        <option value="Ghana" id="GH">Ghana</option>
        <option value="Gibraltar" id="GI">Gibraltar</option>
        <option value="Granada" id="GD">Granada</option>
        <option value="Grecia" id="GR">Grecia</option>
        <option value="Groenlandia" id="GL">Groenlandia</option>
        <option value="Guadalupe" id="GP">Guadalupe</option>
        <option value="Guam" id="GU">Guam</option>
        <option value="Guatemala" id="GT">Guatemala</option>
        <option value="Guayana" id="GY">Guayana</option>
        <option value="Guayana francesa" id="GF">Guayana francesa</option>
        <option value="Guinea" id="GN">Guinea</option>
        <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
        <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
        <option value="Haití" id="HT">Haití</option>
        <option value="Holanda" id="NL">Holanda</option>
        <option value="Honduras" id="HN">Honduras</option>
        <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
        <option value="Hungría" id="HU">Hungría</option>
        <option value="India" id="IN">India</option>
        <option value="Indonesia" id="ID">Indonesia</option>
        <option value="Irak" id="IQ">Irak</option>
        <option value="Irán" id="IR">Irán</option>
        <option value="Irlanda" id="IE">Irlanda</option>
        <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
        <option value="Isla Christmas" id="CX">Isla Christmas</option>
        <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
        <option value="Islandia" id="IS">Islandia</option>
        <option value="Islas Caimán" id="KY">Islas Caimán</option>
        <option value="Islas Cook" id="CK">Islas Cook</option>
        <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
        <option value="Islas Faroe" id="FO">Islas Faroe</option>
        <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
        <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
        <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
        <option value="Islas Marshall" id="MH">Islas Marshall</option>
        <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
        <option value="Islas Palau" id="PW">Islas Palau</option>
        <option value="Islas Salomón" d="SB">Islas Salomón</option>
        <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
        <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
        <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
        <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
        <option value="Israel" id="IL">Israel</option>
        <option value="Italia" id="IT">Italia</option>
        <option value="Jamaica" id="JM">Jamaica</option>
        <option value="Japón" id="JP">Japón</option>
        <option value="Jordania" id="JO">Jordania</option>
        <option value="Kazajistán" id="KZ">Kazajistán</option>
        <option value="Kenia" id="KE">Kenia</option>
        <option value="Kirguizistán" id="KG">Kirguizistán</option>
        <option value="Kiribati" id="KI">Kiribati</option>
        <option value="Kuwait" id="KW">Kuwait</option>
        <option value="Laos" id="LA">Laos</option>
        <option value="Lesoto" id="LS">Lesoto</option>
        <option value="Letonia" id="LV">Letonia</option>
        <option value="Líbano" id="LB">Líbano</option>
        <option value="Liberia" id="LR">Liberia</option>
        <option value="Libia" id="LY">Libia</option>
        <option value="Liechtenstein" id="LI">Liechtenstein</option>
        <option value="Lituania" id="LT">Lituania</option>
        <option value="Luxemburgo" id="LU">Luxemburgo</option>
        <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
        <option value="Madagascar" id="MG">Madagascar</option>
        <option value="Malasia" id="MY">Malasia</option>
        <option value="Malawi" id="MW">Malawi</option>
        <option value="Maldivas" id="MV">Maldivas</option>
        <option value="Malí" id="ML">Malí</option>
        <option value="Malta" id="MT">Malta</option>
        <option value="Marruecos" id="MA">Marruecos</option>
        <option value="Martinica" id="MQ">Martinica</option>
        <option value="Mauricio" id="MU">Mauricio</option>
        <option value="Mauritania" id="MR">Mauritania</option>
        <option value="Mayotte" id="YT">Mayotte</option>
        <option value="México" id="MX">México</option>
        <option value="Micronesia" id="FM">Micronesia</option>
        <option value="Moldavia" id="MD">Moldavia</option>
        <option value="Mónaco" id="MC">Mónaco</option>
        <option value="Mongolia" id="MN">Mongolia</option>
        <option value="Montserrat" id="MS">Montserrat</option>
        <option value="Mozambique" id="MZ">Mozambique</option>
        <option value="Namibia" id="NA">Namibia</option>
        <option value="Nauru" id="NR">Nauru</option>
        <option value="Nepal" id="NP">Nepal</option>
        <option value="Nicaragua" id="NI">Nicaragua</option>
        <option value="Níger" id="NE">Níger</option>
        <option value="Nigeria" id="NG">Nigeria</option>
        <option value="Niue" id="NU">Niue</option>
        <option value="Norfolk" id="NF">Norfolk</option>
        <option value="Noruega" id="NO">Noruega</option>
        <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
        <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
        <option value="Omán" id="OM">Omán</option>
        <option value="Panamá" id="PA">Panamá</option>
        <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
        <option value="Paquistán" id="PK">Paquistán</option>
        <option value="Paraguay" id="PY">Paraguay</option>
        <option value="Perú" id="PE">Perú</option>
        <option value="Pitcairn" id="PN">Pitcairn</option>
        <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
        <option value="Polonia" id="PL">Polonia</option>
        <option value="Portugal" id="PT">Portugal</option>
        <option value="Puerto Rico" id="PR">Puerto Rico</option>
        <option value="Qatar" id="QA">Qatar</option>
        <option value="Reino Unido" id="UK">Reino Unido</option>
        <option value="República Centroafricana" id="CF">República Centroafricana</option>
        <option value="República Checa" id="CZ">República Checa</option>
        <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
        <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
        <option value="República Dominicana" id="DO">República Dominicana</option>
        <option value="Reunión" id="RE">Reunión</option>
        <option value="Ruanda" id="RW">Ruanda</option>
        <option value="Rumania" id="RO">Rumania</option>
        <option value="Rusia" id="RU">Rusia</option>
        <option value="Samoa" id="WS">Samoa</option>
        <option value="Samoa occidental" id="AS">Samoa occidental</option>
        <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
        <option value="San Marino" id="SM">San Marino</option>
        <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
        <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
        <option value="Santa Helena" id="SH">Santa Helena</option>
        <option value="Santa Lucía" id="LC">Santa Lucía</option>
        <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
        <option value="Senegal" id="SN">Senegal</option>
        <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
        <option value="Sychelles" id="SC">Seychelles</option>
        <option value="Sierra Leona" id="SL">Sierra Leona</option>
        <option value="Singapur" id="SG">Singapur</option>
        <option value="Siria" id="SY">Siria</option>
        <option value="Somalia" id="SO">Somalia</option>
        <option value="Sri Lanka" id="LK">Sri Lanka</option>
        <option value="Suazilandia" id="SZ">Suazilandia</option>
        <option value="Sudán" id="SD">Sudán</option>
        <option value="Suecia" id="SE">Suecia</option>
        <option value="Suiza" id="CH">Suiza</option>
        <option value="Surinam" id="SR">Surinam</option>
        <option value="Svalbard" id="SJ">Svalbard</option>
        <option value="Tailandia" id="TH">Tailandia</option>
        <option value="Taiwán" id="TW">Taiwán</option>
        <option value="Tanzania" id="TZ">Tanzania</option>
        <option value="Tayikistán" id="TJ">Tayikistán</option>
        <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico
        </option>
        <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
        <option value="Timor Oriental" id="TP">Timor Oriental</option>
        <option value="Togo" id="TG">Togo</option>
        <option value="Tonga" id="TO">Tonga</option>
        <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
        <option value="Túnez" id="TN">Túnez</option>
        <option value="Turkmenistán" id="TM">Turkmenistán</option>
        <option value="Turquía" id="TR">Turquía</option>
        <option value="Tuvalu" id="TV">Tuvalu</option>
        <option value="Ucrania" id="UA">Ucrania</option>
        <option value="Uganda" id="UG">Uganda</option>
        <option value="Uruguay" id="UY">Uruguay</option>
        <option value="Uzbekistán" id="UZ">Uzbekistán</option>
        <option value="Vanuatu" id="VU">Vanuatu</option>
        <option value="Venezuela" id="VE">Venezuela</option>
        <option value="Vietnam" id="VN">Vietnam</option>
        <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
        <option value="Yemen" id="YE">Yemen</option>
        <option value="Zambia" id="ZM">Zambia</option>
        <option value="Zimbabue" id="ZW">Zimbabue</option>
    </select>
    {!! $errors->first('nacionalidad', '<small>:message</small><br>') !!}
</div>
<button class="btn btn-primary">Enviar</button>
</form>
</div> --}}
{{-- Para traducir los mensajes nos dirigiremos, a la carpeta config y abrimos el archivo --}}
{{-- app.php buscamos la opcion 'locale' => 'en' y la cambiamos a "es" --}}
{{-- a la carpeta  resources, e ingresamos en la carpeta lang creamos la carpeta "es" --}}
{{-- y creamos el archivo validation.php --}}
{{-- para tener todas las traducciones busca en google laravel lang con la version que usas --}}
{{-- Para realizar traducciones de toda la pagina nos dirigimos a la carpeta resources --}}
{{-- e ingresamos a la carpeta lang y creamos el archivo es.json --}}
{{-- </div> --}}
@endsection
