<?php
/**
 * Created by IntelliJ IDEA.
 * User: elazzam
 * Date: 4/20/15
 * Time: 9:16 PM
 */
?>


@extends('layouts.default')

@section('content')

<div class="panel-body">
    <div class="panel panel-default" >
        <div class="panel-heading">
            <h3 class="panel-title">Modifier Catalogue</h3>
        </div>
        <div class="panel-body">

            {!! Form::open(array('url' => "/catalogue/$catalogue->id", 'class'=>'form-horizontal','method'=>'put')) !!}

            <div class="form-group">
                {!! Form::label("inputAtelier",'Atelier',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::select('departement', array('concasseur' => 'Atelier Concasseur', 'preho' => 'Atelier PREHO'),$catalogue->departement) !!}
                    @if($errors->has())
                    {!! $errors->first("departement",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label('inputdispo','Disponible',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($catalogue->disponible==0) active @endif">
                            <input type="radio" name="disponible" id="option" value="0" autocomplete="off" @if($catalogue->disponible==0) checked @endif> Oui
                        </label>
                        <label class="btn btn-primary @if($catalogue->disponible==1) active @endif">
                            <input type="radio" name="disponible" id="option" value="1" autocomplete="off" @if($catalogue->disponible==1) checked @endif> Non
                        </label>
                    </div>
                    @if($errors->has())
                    {!! $errors->first("disponible",'<p class="text-danger">:message</p>')!!}
                    @endif

                </div>
            </div>

            <div class="form-group" >
                {!! Form::label("inputReference",'Reference',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text("reference", $catalogue->reference,array('class'=>'form-control' ,'id'=>"inputReference")) !!}
                    @if($errors->has())
                    {!! $errors->first("reference",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label("inputDesignation",'Designation',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text("designation", $catalogue->designation,array('class'=>'form-control' ,'id'=>"prixDesignation")) !!}
                    @if($errors->has())
                    {!! $errors->first("designation",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label("inputCommentaire",'Commentaire ',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::textarea("commentaire", $catalogue->commentaire,array('class'=>'form-control' ,'id'=>"inputCommentaire")) !!}
                    @if($errors->has())
                    {!! $errors->first("commentaire",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label("inputLocataire",'employee ',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text("locataire", $catalogue->locataire,array('class'=>'form-control' ,'id'=>"inputLocataire")) !!}
                    @if($errors->has())
                    {!! $errors->first("locataire",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>

            <div class="form-group">
                {!! Form::label("inputDate",'date sortie ',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::input('date',"date_sortie", $catalogue->date_sortie,array('class'=>'form-control' ,'id'=>"inputDate")) !!}
                    @if($errors->has())
                    {!! $errors->first("date_sortie",'<p class="text-danger">:message</p>')!!}
                    @endif
                </div>
            </div>
            <br/>



            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Modifier
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Sauvegarder les donnees</h4>
                        </div>
                        <div class="modal-body">
                            vous Voulez Modifier ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Oui</button>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>

@stop