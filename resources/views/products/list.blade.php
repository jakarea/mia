<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-striped table-bordered">
						<thead class="panel-heading">
							<a href="{{route('addProduct')}}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new </a>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Category</th>
								<th>Parent</th>
								<th>Price</th>
								<th>Discount</th>
								<th class="text-center">Status</th>
								<th class="text-center">Featured</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->sn }}</td>
							<td>{{ $product->title }}</td>
							<td>{{ $product->category }}</td>
							<td>{{ $product->partner }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->discount }}</td>
							<td class="text-center"><span class="glyphicon glyphicon-{{ $product->status }}"></span></td>
							<td class="text-center"><span class="glyphicon glyphicon-{{ $product->featured }}"></span></td>

							<td class="text-center">
								<a class='btn btn-primary btn-xs' href="{{ route('editProduct',$product->id)}}"><span class="glyphicon glyphicon-edit"></span></a> 
								<a href="{{ route('deleteProduct',$product->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</body>

</html>