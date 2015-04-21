<?php
/**
 * Created by IntelliJ IDEA.
 * User: elazzam
 * Date: 4/20/15
 * Time: 9:15 PM
 */
?>

@extends('layouts.default')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Liste des catalogues</h4>
    </div>
    <div class="panel-body">



        <div class="form-group">
            {!! Form::label("inputAtelier",'Atelier',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::select('departement', array(''=>'','concasseur' => 'Atelier Concasseur', 'preho' => 'Atelier PREHO'),null,array('id'=>'departement')) !!}
            </div>
        </div>
        <br/>

        <div class="form-group">
            {!! Form::label('inputReference','Reference',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::text('reference', Input::old('reference'),array('class'=>'form-control' ,'id'=>'inputReference')) !!}
                <br/>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('inputDesignation','Designation',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::text('designation', Input::old('designation'),array('class'=>'form-control' ,'id'=>'inputDesignation')) !!}
                <br/>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('inputLocataire','employee',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::text('locataire', Input::old('locataire'),array('class'=>'form-control' ,'id'=>'inputLocataire')) !!}
                <br/>
            </div>
        </div>



        <div class="form-group">
            {!! Form::label('inputdispo','Disponible',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="etat" id="option" value="0" autocomplete="off"> Oui
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="etat" id="option" value="1" autocomplete="off"> Non
                    </label>
                    <label class="btn btn-primary active">
                        <input type="radio" name="etat" id="option" value="2" autocomplete="off" checked> tout
                    </label>
                </div>

            </div>
        </div>

        <div class="form-group">

                <div class="contenu">
                    @include('catalogue.ajaxtable')
                </div>
            <a class="btn btn-default" href="/catalogue/create" role="button">Ajouter Catalogue</a>
        </div>

    </div>



</div>




<script>
    //var page = $(".pagination a").attr('href').split('page=')[1];
    //getTerrain(page);
    //console.log(page);

    $(window).on('hashchange',function(){
        page = window.location.hash.replace('#','');
        getCatalogue(page);
    });

    $(document).on('click','.pagination a',function (e){
        var page = $(this).attr('href').split('page=')[1];

        getCatalogue(page);
        return false;



    });

    $('#inputReference').keyup(function(event){
        getCatalogue(1);
        return false;
    });
    $('#inputDesignation').keyup(function(event){
        getCatalogue(1);
        return false;
    });
    $('#inputLocataire').keyup(function(event){
        getCatalogue(1);
        return false;
    });

    $('#inputCommentaire').keyup(function(event){
        getCatalogue(1);
        return false;
    });
    $(document).on('change','#option',function (event){

        getCatalogue(1);
    });
    $(document).on('change','#departement',function (event){
        getCatalogue(1);
    });


    function getCatalogue(page){
        $.ajax({
            url: '/catalogue/?page='+page+'&reference='+$('#inputReference').val()+'&etat='+$('#option:checked').val()+'&designation='+$('#inputDesignation').val()+'&locataire='+$('#inputLocataire').val()+'&departement='+$('#departement').val()
        }).done(function(data){

            $('div.contenu').html(data);
            location.hash = page;

        });
    }
</script>

@stop
