<!DOCTYPE html>
<html>
<head>
	<title>Print Pdf</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Report Transaksi</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Qty</th>
				<th>Total Price</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaction as $data)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$data->nama}}</td>
				<td>{{$data->productId->name}}</td>
				<td>{{$data->productId->harga }}</td>
				<td>{{$data->qty}}</td>
				<td>{{$data->productId->harga * $data->qty }}</td>
				<td>{{$data->status}}</td>
			</tr>
			@endforeach

		</tbody>
	</table>
 
</body>
</html>