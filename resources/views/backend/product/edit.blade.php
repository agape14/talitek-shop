@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Editar Producto</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titulo <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Ingrese Titulo"  value="{{$product->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Descripcion corto <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$product->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Descripcion larga</label>
          <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">Está Destacado</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='{{$product->is_featured}}' {{(($product->is_featured) ? 'checked' : '')}}> Si                        
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">Categoria <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Selecciona una Categoria--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}' {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>
        @php 
          $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
        // dd($sub_cat_info);

        @endphp
        {{-- {{$product->child_cat_id}} --}}
        <div class="form-group {{(($product->child_cat_id)? '' : 'd-none')}}" id="child_cat_div">
          <label for="child_cat_id">Sub Categoria</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Selecciona una Sub Categoria--</option>
              
          </select>
        </div>

        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="price" class="col-form-label">Precio Soles<span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" placeholder="Ingresa Precio Soles" value="{{$product->price}}" step="0.01" min="0.01" class="form-control">
                  @error('price')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="price_dollar" class="col-form-label">Precio Dolares<span class="text-danger">*</span></label>
                  <input id="price_dollar" type="number" name="price_dollar" placeholder="Ingresa Precio Dolares" value="{{$product->price_dollar}}" step="0.01" min="0.01" class="form-control">
                  @error('price_dollar')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
      </div>

        {{--<div class="form-group">
          <label for="price" class="col-form-label">Price(NRS) <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Ingrese price"  value="{{$product->price}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>--}}

        <div class="form-group">
          <label for="discount" class="col-form-label">Descuento(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Ingrese Descuento"  value="{{$product->discount}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group d-none">
          <label for="size">Tamaño</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--Selecciona un Tamaño--</option>
              @foreach($items as $item)              
                @php 
                $data=explode(',',$item->size);
                @endphp
              <option value="S"  @if( in_array( "S",$data ) ) selected @endif>Small</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="brand_id">Marca</label>
          <select name="brand_id" class="form-control">
              <option value="">--Seleciona Marca--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
             @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="condition">Condicion</label>
          <select name="condition" class="form-control">
              <option value="">--Seleciona Condicion--</option>
              <option value="default" {{(($product->condition=='default')? 'selected':'')}}>Defecto</option>
              <option value="new" {{(($product->condition=='new')? 'selected':'')}}>Nuevo</option>
              <option value="hot" {{(($product->condition=='hot')? 'selected':'')}}>Oferta</option>
          </select>
        </div>

        <div class="form-group">
          <label for="stock">Cantidad <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Ingrese Cantidad"  value="{{$product->stock}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Imagen <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                  <i class="fas fa-image"></i> Seleccionar
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Estado <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($product->status=='active')? 'selected' : '')}}>Activo</option>
            <option value="inactive" {{(($product->status=='inactive')? 'selected' : '')}}>Inactivo</option>
        </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Escribe una breve descripción.....",
        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Escribir descripción detallada.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$product->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Selecciona una one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
                            }
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
            else{

            }

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush