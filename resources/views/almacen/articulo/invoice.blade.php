<!DOCTYPE html>
<html>
<head>
	<title>Ninguna descripcion</title>
</head>
<body>
	@foreach($articulos as $ articulo)

	{{$articulo->codigo}}
	{{$articulo->nombre}}
	@endforeach

</body>
</html>