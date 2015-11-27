<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Bingo Integral - Datos de acceso</h2>

        <p>{{ $name }} has sido registrado en la aplicación de Bingo Integral, estos son sus datos de ingreso:</p>
 
        <div>E-mail: {{ $email }}</div>
        <div>Password: {{ $password }}</div>
        <div>Ingreso: <a href="http://www.bingointegral.com.ar/login">www.bingointegral.com.ar/login</a></div>
        <br/>

        <p><strong>IMPORTANTE:</strong> Le sugerimos que una vez dentro de la aplicación cambie el password que le hemos generado automáticamente por uno que le sea familiar.</p>

        <p>En el caso de existir algún problema en el ingreso al sitio web por favor comuníquese con nosotros.</p>

        <p>Saludos cordiales,</p>
        <p>Staff de Bingo Integral</p>

        <br/><br/>
        <hr>
        <div>
            ©{{ date("Y") }} Bingo Integral - <a href="http://www.bingointegral.com.ar">www.bingointegral.com.ar</a>
        </div>
    </body>
</html>