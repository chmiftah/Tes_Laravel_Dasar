<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pegawai {{ $companie->name  }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
			border: 1px solid black;
			padding: 14px;
		}
	</style>

	<center>
		<h5 style="font-size: 20px">Daftar Employee {{ $companie->name  }}</h4>
	

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Companie</th>
				<th>Since</th>
			
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($employee as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$item->nama}}</td>
				<td>{{$item->email}}</td>
				<td>{{$companie->name}}</td>
				<td>{{$item->created_at->format('d F, Y')}}</td>
	
			</tr>
			@endforeach
		</tbody>
	</table>
</center>
 
</body>
</html>