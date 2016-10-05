<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<style type="text/css">
			.entry_next_doc {
			    margin-left: 35px;
			}
			.entry_radio_btn label {
			    margin-top: -6px;
			}
			.entry_sub_btn span{
				background: #fff;
			    color: #265a88;
			    font-size: 10px;
			    padding: 3px;
			    border-radius: 15px;
			    margin-right: 6px;
			    text-align: center;
			}
			.sub_btn span {
			    background: none;
			    color: #fff;
			    font-size: 12px;
			    margin-right: 2px;
			}
			.entry_sub_img img{
				width: 100px;
    			height: auto;
			    overflow: hidden;
			    padding: 3px;
			}
			@media only screen and (min-width: 320px) and (max-width: 767px) { 
				.entry_sub_img img{
					margin-left: -30px;
				}
				.entry_radio_btn{
					margin-top: 0px;
				}
				.entry_sub_btn button{
					margin-left: -41px;
					margin-right: 43px;
					padding: 5px;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-left"><b>{{ ($id)?"Edit":"New"}} Entry</b></h2>
				</div>
				<form class="form-horizontal" action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label class="col-md-2 control-label" for="title">Ttile:</label>
							<div class="col-md-10">
								<input id="title" name="title" type="text" placeholder="Product title" class="form-control" value="{{ ($id)?$product->title:''}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="category">Category:</label>
							<div class="col-md-10">
								<select class="form-control" name="category">
									<option value=''>Select a category</option>
									<option value="Category 1" @if($id) {{ ($product->category =="Category 1" )?"selected":'' }}@endif>Category 1</option>
									<option value="Category 2" @if($id) {{ ($product->category =="Category 2" )?"selected":'' }}@endif>Category 2</option>
									<option value="Category 3" @if($id) {{ ($product->category =="Category 3" )?"selected":'' }}@endif>Category 3</option>
									<option value="Category 4" @if($id) {{ ($product->category =="Category 4" )?"selected":'' }}@endif>Category 4</option>
									<option value="Category 5" @if($id) {{ ($product->category =="Category 5" )?"selected":'' }}@endif>Category 5</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="partner">Partner:</label>
							<div class="col-md-10">
								<select class="form-control" name="partner">
									<option value="">Select a partner</option>
									<option value="Partner 1" @if($id) {{ ($product->partner =="Partner 1" )?"selected":'' }}@endif >Partner 1</option>
									<option value="Partner 2" @if($id) {{ ($product->partner =="Partner 2" )?"selected":'' }}@endif >Partner 2</option>
									<option value="Partner 3" @if($id) {{ ($product->partner =="Partner 3" )?"selected":'' }}@endif >Partner 3</option>
									<option value="Partner 4" @if($id) {{ ($product->partner =="Partner 4" )?"selected":'' }}@endif >Partner 4</option>
									<option value="Partner 5" @if($id) {{ ($product->partner =="Partner 5" )?"selected":'' }}@endif >Partner 5</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="description">Description</label>
							<div class="col-md-10">
								<textarea class="form-control" id="description" name="description" placeholder="Product description here..." rows="5"> {{ ($id)?$product->description:''}}</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="entry_next_doc">
						<div class="row">
							<div class="form-group entry_radio_btn">
								<label class="col-md-2 col-sm-4 col-xs-6 control-label" for="name">Published: &nbsp; </label>
								<div class="col-md-3 col-sm-6 col-xs-6 entry_radio_btn">
									<input type="radio" name="status" value="1" @if($id) {{ ($product->status ===1 )?"checked":'' }} @endif> Yes &nbsp;
									<input type="radio" name="status" value="0" @if($id) {{ ($product->status ===0 )?"checked":'' }} @endif> No
								</div>
								<label class="col-md-2 col-sm-4 col-xs-6 control-label" for="name">Featured: &nbsp; </label>
								<div class="col-md-3 col-sm-6 col-xs-6 entry_radio_btn">
									<input type="radio" name="featured" value="1" @if($id) {{ ($product->featured ===1 )?"checked":'' }} @endif> Yes &nbsp;
									 <input type="radio" name="featured" value="0" @if($id) {{ ($product->featured ===0 )?"checked":'' }} @endif> No
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label class="col-md-2 col-sm-4 col-xs-4 control-label" for="price">Price:</label>
								<div class="col-md-4 col-sm-8 col-xs-6">
									<input id="price" name="price" type="text"  placeholder="Price" class="form-control" value="{{ ($id)?$product->price:''}}">
								</div>
								<label class="col-md-2 col-sm-4 col-xs-4 control-label" for="discount">Discount(%):</label>
								<div class="col-md-4 col-sm-8 col-xs-6">
									<input id="discount" name="discount" type="text" placeholder="Discount" class="form-control" value="{{ ($id)?$product->discount:''}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="col-md-2 col-sm-4 col-xs-4 control-label" for="file">File:</label>
								<div class="col-md-10 col-sm-8 col-xs-6">
									<input id="file" name="file" type="file" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 col-sm-4 col-xs-4 control-label" for="uploadImageFile">Thumbnail:</label>
								<div class="col-md-10 col-sm-8 col-xs-6">
									<input id="uploadImageFile" name="uploadImageFile" type="file" class="form-control" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="entry_sub_btn col-md-5 col-md-offset-2 col-sm-8 col-xs-8">
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>Save</button>
								<button type="cancel" class="btn btn-danger sub_btn"><span class="glyphicon glyphicon-repeat"></span>Cancel</button>
							</div>
							<div class=" col-md-3 col-md-offset-2 col-sm-4 col-xs-3 entry_sub_img">
								<img src="{{ url(($id)?"uploads/products/".$id.".jpg":'uploads/default.png') }}" id="preview" alt="Responsive image">
							</div>
						</div>
					</div>
					</div>
					<input type="hidden" name="id" value="{{$id}}">
				</form>
			</div>
		</div>
	</body>
</html>
	<script type="text/javascript">
			
			function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#uploadImageFile").change(function(){
        readURL(this);
    });
    
	</script>
