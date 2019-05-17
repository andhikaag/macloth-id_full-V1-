@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Product
       <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
<div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                    {{csrf_field()}} 
                <!-- text input -->
                <div class="form-group">
                <label>Nama Produk :</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Harga :</label>
                    <input type="text" name="harga" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="Shirt">Shirt</option>
                        <option value="Sweater">Sweater</option>
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Dress">Dress</option>
                        <option value="Jacket">Jacket</option>
                        <option value="Pants">Pants</option>
						<option value="Skirt">Skirt</option>
                    </select>
                </div>
                <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Gambar 1</label>
                    <input type="file" id="exampleInputFile" name="img1">
  
                    <p class="help-block">Upload Gambar Pertama</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Gambar 2</label>
                    <input type="file" id="exampleInputFile" name="img2">
  
                    <p class="help-block">Upload Gambar Kedua</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Gambar 3</label>
                    <input type="file" id="exampleInputFile" name="img3">
  
                    <p class="help-block">Upload Gambar Ketiga</p>
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                        <label>
                          <input type="radio" value="Tersedia" name="status" class="minimal" required>
                          Tersedia
                        </label><br>
                        <label>
                          <input type="radio" value="Kosong" name="status" class="minimal" disabled required>
                          Kosong
                        </label>
                </div>
                <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
</section>
</div>
@endsection