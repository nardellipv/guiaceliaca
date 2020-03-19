<p><img src="https://guiaceliaca.com.ar/images/img-logo.png" alt="" width="178" height="145"/></p>
<hr/>
<p>Reporte de usuarios registrados</p>
<p><b>Cantidad de usuarios:</b> {{ $userCount }}</p>

<table style="height: 77px; margin-left: auto; margin-right: auto;" border="1" width="480">
    <tbody>
    <tr style="background-color: #00f000;">
        <td>Nombre</td>
        <td>Apellido</td>
        <td>email</td>
        <td>type</td>
        <td>Fecha</td>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->created_at->format('d/M/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Saludos,&nbsp;</p>
<p>Gu&iacute;a Cel&iacute;aca</p>
<hr/>
<p>
    <sub><span style="color: #ff0000;">Este mail fue generado autom&aacute;ticamente, por favor no responda este email.</span></sub>
</p>