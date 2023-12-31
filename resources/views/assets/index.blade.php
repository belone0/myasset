@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card glass p-5">
            <div class="card-body">
                <p class=" text-center display-2  mt-5">My Assets</p>
                <p class=" text-center display-2 fs-4 mb-5">Keep track all your favorite assets!</p>
            </div>
            <div class="row">
                {{--acoes start--}}
                <div class="col-12 col-lg-3 p-4 ">
                    <h1 class="text-center mb-0 ">Ações</h1>
                    <p class="fs-6 text-center mb-3">Bovespa</p>
                    <form action="{{ route('assets.store') }}" method="POST" class="mb-4 d-flex justify-content-evenly">
                        @csrf
                        <select class="w-75 form-select js-example-basic-single" name="code">
                            @foreach(\App\Http\Helpers\AssetIndexHelper::acoesIndex() as $item)
                                <option data-select2-id="{{$item}}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="type" id="type" value="acao">
                        <button type="submit" class=" btn"><i class="text-primary fa-solid fa-add"></i>
                        </button>
                    </form>
                    @foreach(auth()->user()->assetIndexByType('acao')->get() as $asset)
                        <div class=" p-1 d-flex justify-content-between">
                            <i class="fs-4 text-center fa-solid fa-coins"></i>
                            <p class="fs-6">{{$asset->code}}</p>
                            <p class="fs-6" style="; color: {{$asset->profitOrPrejudiceColor()}}"><span
                                    style="font-size: 10px; color: black"> R$ </span>{{\App\Http\Helpers\AssetIndexHelper::getAssetPrice($asset->code,$asset->type)}}
                                <span style="font-size: 10px">{{$asset->profitOrPrejudiceDifferential()}}</span>
                            </p>

                            <form method="POST" action="{{route('assets.destroy',$asset)}}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn  "
                                        title="Remove Asset"
                                        onclick="return confirm(&quot;Are you sure you want to delete?&quot;)"><i
                                        class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
                {{-- acoes end--}}
                {{--fiis start--}}
                <div class="col-12 col-lg-3 p-4 ">
                    <h1 class="text-center mb-0 ">FIIs</h1>
                    <p class="fs-6 text-center mb-3">Bovespa</p>
                    <form action="{{ route('assets.store') }}" method="POST" class="mb-4 d-flex justify-content-evenly">
                        @csrf
                        <select class="w-75 form-select js-example-basic-single" name="code">
                            @foreach(\App\Http\Helpers\AssetIndexHelper::fiisIndex() as $item)
                                <option data-select2-id="{{$item}}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="type" id="type" value="fii">
                        <button type="submit" class=" btn"><i class="text-primary fa-solid fa-add"></i>
                        </button>
                    </form>
                    @foreach(auth()->user()->assetIndexByType('fii')->get() as $asset)
                        <div class=" p-1 d-flex justify-content-between">
                            <i class="fs-4 text-center fa-solid fa-coins"></i>
                            <p class="mb-0 fs-6">{{$asset->code}}</p>
                            <p class="fs-6" style="; color: {{$asset->profitOrPrejudiceColor()}}"><span
                                    style="font-size: 10px; color: black"> R$ </span>{{\App\Http\Helpers\AssetIndexHelper::getAssetPrice($asset->code,$asset->type)}}
                                <span style="font-size: 10px">{{$asset->profitOrPrejudiceDifferential()}}</span>
                            </p>
                            <form method="POST" action="{{route('assets.destroy',$asset)}}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn  "
                                        title="Remove Asset"
                                        onclick="return confirm(&quot;Tem certeza que deseja exluir?&quot;)"><i
                                        class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
                {{-- fiis end--}}
                {{--stocks start--}}
                <div class="col-12 col-lg-3 p-4 ">
                    <h1 class="text-center mb-0 ">Stocks</h1>
                    <p class="fs-6 text-center mb-3">Nasdaq</p>
                    <form action="{{ route('assets.store') }}" method="POST" class="mb-4 d-flex justify-content-evenly">
                        @csrf
                        <select class="w-75 form-select js-example-basic-single" name="code">
                            @forelse(\App\Http\Helpers\AssetIndexHelper::stocksIndex() as $item)
                                <option data-select2-id="{{$item}}">{{ $item }}</option>
                            @empty
                                <option value="">Ocorreu um erro</option>
                            @endforelse
                        </select>
                        <input type="hidden" name="type" id="type" value="stock">
                        <button type="submit" class=" btn"><i class="text-primary fa-solid fa-add"></i>
                        </button>
                    </form>
                    @foreach(auth()->user()->assetIndexByType('stock')->get() as $asset)
                        <div class=" mb-3 p-1 d-flex justify-content-between">
                            <i class="fs-4 text-center fa-solid fa-coins"></i>
                            <p class="fs-6">{{$asset->code}}</p>
                            <p class="fs-6" style="; color: {{$asset->profitOrPrejudiceColor()}}"><span
                                    style="font-size: 10px; color: black"> $ </span>{{\App\Http\Helpers\AssetIndexHelper::getAssetPrice($asset->code,$asset->type)}}
                                <span style="font-size: 10px">{{$asset->profitOrPrejudiceDifferential()}}</span>
                            </p>
                            <form method="POST" action="{{route('assets.destroy',$asset)}}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn  "
                                        title="Remove Asset"
                                        onclick="return confirm(&quot;Are you sure you want to delete?&quot;)"><i
                                        class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
                {{--stocks end--}}
                {{--crypto start--}}
                <div class="col-12 col-lg-3 p-4 ">
                    <h1 class="text-center mb-0 ">Crypto</h1>
                    <p class="fs-6 text-center mb-3">Most Popular</p>
                    <form action="{{ route('assets.store') }}" method="POST" class="mb-4 d-flex justify-content-evenly">
                        @csrf
                        <select class="w-75 form-select js-example-basic-single" name="code">
                            @foreach(\App\Http\Helpers\AssetIndexHelper::cryptoIndex() as $item)
                                <option data-select2-id="{{$item}}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="type" id="type" value="crypto">
                        <button type="submit" class=" btn"><i class="text-primary fa-solid fa-add"></i>
                        </button>
                    </form>
                    @foreach(auth()->user()->assetIndexByType('crypto')->get() as $asset)
                        <div class="p-1  mb-3 d-flex justify-content-between">
                            <i class="fs-4 text-center fa-solid fa-coins"></i>
                            <p class="fs-6">{{$asset->code}}</p>
                            <p class="fs-6" style="; color: {{$asset->profitOrPrejudiceColor()}}"><span
                                    style="font-size: 10px; color: black"> R$ </span>{{\App\Http\Helpers\AssetIndexHelper::getAssetPrice($asset->code,$asset->type)}}
                                <span style="font-size: 10px">{{$asset->profitOrPrejudiceDifferential()}}</span>
                            </p>
                            <form method="POST" action="{{route('assets.destroy',$asset)}}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn " title="Remove Asset"
                                        onclick="return confirm(&quot;Are you sure you want to delete?&quot;)"><i
                                        class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    @endforeach
                    {{--crypto end--}}
                </div>
            </div>
        </div>
    </div>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>
        <script>
            $('.js-example-basic-single').select2({
                placeholder: 'Selecione um ativo',
                theme: 'bootstrap'
            });
        </script>
@endsection
