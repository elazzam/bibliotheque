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
        <h4>Plan {{$plan->designation}}</h4>
    </div>
    <!-- drop files partie -->
    <div class="panel-body">


        <table class="table table-bordered">
            <tr>
                <td>Reference</td>
                <td> {{$plan->reference}}</td>
            </tr>
            <tr>
                <td>Designation </td>
                <td> {{$plan->designation}}</td>
            </tr>
            <tr>
                <td>Disponibe </td>
                <td> @if($plan->disponible == 1) Oui @else Non @endif</td>
            </tr>
            @if($plan->disponible)
            <tr>
                <td>employee </td><td> {{$plan->locataire}}</td>
            </tr>
            <tr>
                <td>date sortie </td><td> {{$plan->date_sortie}}</td>
            </tr>
            @endif
            <tr>
                <td>commentaire </td><td>{{$plan->commentaire}}</td>
            </tr>
            <tr>
                <td>plan</td>
                <td>
                    <?php if(count(glob("document/plans/$plan->id")) === 0){ ?>
                        Absent
                    <?php }else{?>
                        <a href="/plan/{{$plan->id}}/download" class="btn btn-default">Telecharger</a>

                    <?php } ?>
                </td>
            </tr>

        </table>



        <a class="btn btn-default" href="/plan/{{$plan->id}}/edit" role="button">modifier plan</a>

    </div>
</div>
@stop