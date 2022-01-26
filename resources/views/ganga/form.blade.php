@extends('layouts.gangaBatoi')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if(isset($ganga))
                <form method="POST" novalidate action="{{route('ganga.update',$ganga->id)}}" enctype="multipart/form-data">
                    <h2>Editando</h2>
                    @method('PUT')
                    @else
                        <form method="POST" novalidate action="{{route('ganga.store')}}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <?php if (isset($ganga->id)): ?>
                            <div class="form-group">
                                <label for="name">Id:<?= $ganga->id ?></label>
                                <input name="id" type="hidden" value="<?= $ganga->id ?>">
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="title" type="text" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Enter Title" value="{{old('title')??(isset($ganga)?$ganga->title:'')}}">
                                <small id="nameHelp" class="form-text text-muted">Nombre del  la ganga</small>
                                @if ($errors->has('title'))
                                    <div class="text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" > {{old('description')??(isset($ganga)?$ganga->description:'')}}</textarea>
                                <small id="nameHelp" class="form-text text-muted">title of ganga</small>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="url">Url:</label>
                                <input name="url" type="url" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Enter Url" value="{{old('url')??(isset($ganga)?$ganga->url:'')}}">

                                <small id="nameHelp" class="form-text text-muted">La teu Url</small>
                                @if ($errors->has('url'))
                                    <div class="text-danger">
                                        {{ $errors->first('url') }}
                                    </div>
                                @endif

                            </div>


                            <div class="form-group">
                                <p>Available</p> <br>
                                ----------------------------------------------------------
                                <input type="radio" id="true" name="available" value="1">
                                <label for="html">True</label><br>
                                <input type="radio" id="false" name="available" value="0">
                                <label for="css">False</label><br>

                                <small id="nameHelp" class="form-text text-muted">si esta available o lo que sea ...</small>
                                @if ($errors->has('available'))
                                    <div class="text-danger">
                                        {{ $errors->first('available') }}
                                    </div>
                                @endif

                            </div>
                            ------------------------------------------------------------------------------------

                            <div class="form-group">
                                <label for="discount_price">Discount Price:</label>
                                <input name="discount_price" step="0.01" type="number" class="form-control " id="discount_price" aria-describedby="dpriceHelp" placeholder="Enter Discount Price" value="{{old('discount_price')??(isset($ganga)?$ganga->discount_price:'')}}">
                                <small id="dPriceHelp" class="form-text text-muted">Discount Price.</small>

                            </div>
                            @if ($errors->has('discount_price'))
                                <div class="text-danger">
                                    {{ $errors->first('discount_price') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="price">Original Price:</label>
                                <input name="price" type="number" step="0.01" class="form-control " id="price" aria-describedby="priceHelp" placeholder="Enter Original" value="{{old('price')??(isset($ganga)?$ganga->price:'')}}">
                                <small id="priceHelp" class="form-text text-muted">Original Price.</small>
                            </div>
                            @if ($errors->has('price'))
                                <div class="text-danger">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <small id="nameHelp" class="form-text text-muted">Categoria de la ganga</small>
                                <select class="form-control" name="id_category"  >
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @isset($ganga) {{$category->id== $ganga->category_id?'selected':''}} @endisset >   {{ $category->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <div class="text-danger">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="points">Points:</label>
                                <input name="points" type="number" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Points" value="{{old('points')??(isset($ganga)?$ganga->points:'')}}">
                                <small id="nameHelp" class="form-text text-muted">Puntua el producto del 1 al 10</small>
                                @if ($errors->has('points'))
                                    <div class="text-danger">
                                        {{ $errors->first('points') }}
                                    </div>
                                @endif

                            </div>

                            <!--
                            <div class="form-group">
                                <label for="PhotoFile">Puja Foto</label>
                                <input type="file" name="photo" class="form-control-file " id="PhotoFile">
                            </div> -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
        </div>

    </section>
@endsection
