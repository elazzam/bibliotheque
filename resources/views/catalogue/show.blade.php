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
        <h4>Catalogue {{$catalogue->designation}}</h4>
    </div>
    <!-- drop files partie -->
    <div class="panel-body">


        <table class="table table-bordered">
            <tr>
                <td>Reference</td>
                <td> {{$catalogue->reference}}</td>
            </tr>
            <tr>
                <td>Designation </td>
                <td> {{$catalogue->designation}}</td>
            </tr>
            <tr>
                <td>Disponibe </td>
                <td> @if($catalogue->disponible == 1) Oui @else Non @endif</td>
            </tr>
            @if($catalogue->disponible)
            <tr>
                <td>employee </td><td> {{$catalogue->locataire}}</td>
            </tr>
            <tr>
                <td>date sortie </td><td> {{$catalogue->date_sortie}}</td>
            </tr>
            @endif
            <tr>
                <td>commentaire </td><td>{{$catalogue->commentaire}}</td>
            </tr>


        </table>



        <a class="btn btn-default" href="/catalogue/{{$catalogue->id}}/edit" role="button">modifier catalogue</a>

    </div>
</div>
@stop