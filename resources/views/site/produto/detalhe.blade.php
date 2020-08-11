@extends('site.templates.template')

@section('title', 'Detalhe')

@push('scripts-top')
<link href="http://www.artmetaismatao.com.br/css/easyzoom.css" rel="stylesheet">
@endpush

@section('content')

@include('includes.menulateral')

<section class="detalhes">
    <div class="container">
        @forelse( $produtos as $produto )
        <h3 class="text-center mg-40">{{$produto->produto}}</h3>
        <div class="col-lg-4 col-md-4">
            <div class="slider-zoom" style="margin-bottom: 50px;">
                <div id="img0" class="easyzoom active width-100 is-ready">
                    <a class="muda" href="{{url("assets/uploads/imgs/produtos/{$produto->imagem}")}}">
                        <img width="100%" class="muda style-photo" src="{{url("assets/uploads/imgs/produtos/{$produto->imagem}")}}" alt="" style="    border: #d7d7d7 1px solid;"> </a>
                </div>
            </div>
        </div> 

        <div class="col-lg-4 col-md-4 text-center">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">{{$produto->produto}}</div>
                <div class="panel-body">
                    <h4>Código: {{$produto->codigo}}</h4>
                </div>

                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">Material: {{$produto->material}}</li>
                    <li class="list-group-item">Peso: {{$produto->peso}}g</li>
                    <li class="list-group-item">Qtde: {{$produto->quantidade}}</li>
                    <li class="list-group-item">
                        <button class="btn btn-primary mg-40" id="orcamento"  data-toggle="modal" data-target="#enviarOrcamento" style="margin:0">Orçamento</button> 
                    </li>
                </ul>
            </div>
            
        </div>
        @empty
        <p>Não possui detalhes deste produto</p>
        @endforelse    
    </div>    
</section>

<!-- Modal -->
<div class="modal fade" id="enviarOrcamento" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Orçamento</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger msg-war" role="alert" style="display: none"> </div>
                <div class="alert alert-success msg-suc" role="alert" style="display: none"> </div>
                <!-- content goes here -->
                <form action="/orcamento" method="POST" id="form">
                    {{csrf_field()}}
                    
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" name="nome" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Produto</label>
                        <input type="hidden" class="form-control" name="produto" value="Cód {{$produto->codigo}} - {{$produto->produto}}"  disabled>
                        <input type="hidden" class="form-control" name="codigo" value="{{$produto->codigo}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantidade</label>
                        <div class="controls controls-row">
                            <select class="form-control" name="quantidade">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4 </option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>  
                    <button type="submit"  id="orcamento" class="btn btn-default btn-hover-green btn-block" data-action="save" role="button">Enviar</button>    
                </form>

            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="reset" class="btn btn-default btn-block " id="orcamento">Limpar</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button"  id="orcamento">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts-bottom')

<script src="http://www.artmetaismatao.com.br/js/easyzoom.js"></script>
<script>
$(function () {
    var $easyzoom = $('.easyzoom').easyZoom();
    var api = $easyzoom.data('easyZoom');
    $(".img-gal").click(function () {
        $('.easyzoom').hide().removeClass("active");
        $($(this).attr("href")).show().addClass("active");
    });
});

$(function(){
    jQuery("#form").submit(function(){
       jQuery(".msg-war").hide();
       jQuery(".msg-suc").hide();
       var dadosForm = jQuery(this).serialize(); 
       
       jQuery.ajax({
           url: '/orcamento',
           data: dadosForm,
           method: 'POST'
       }).done(function(data){
           jQuery(".msg-suc").html('Orçamento enviado com Sucesso!');
           jQuery(".msg-suc").show();
           
           setTimeout("jQuery('.msg-suc').hide();jQuery('#enviarOrcamento').modal('hide');location.reload();", 3500);
       }).fail(function(){
           jQuery(".msg-war").hmtl('Erro ao enviar o orçamento! entra diretamento conosco: aa@gmail.com');
           jQuery(".msg-war").show();
           
           setTimeout("jQuery('.msg-war').hide();", 2500);
       });
       
       return false;
    });
});


</script>
@endpush