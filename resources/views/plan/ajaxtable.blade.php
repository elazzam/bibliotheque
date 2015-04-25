<?php
/**
 * Created by IntelliJ IDEA.
 * User: elazzam
 * Date: 4/20/15
 * Time: 9:58 PM
 */
?>

<table class="table table-striped table-bordered">
    <th>reference</th>
    <th>designation</th>
    <th>disponible</th>
    <th>locataire</th>
    <th>date sortie</th>
    <th>commentaire</th>
    <th>plan</th>
    <th>actions</th>
    @foreach($plans as $plan)
    <tr>

        <td>{{$plan->reference}}</td>
        <td>{{$plan->designation}}</td>
        <td><?php if($plan->disponible) echo 'non'; else echo 'oui';?></td>
        <td>{{$plan->locataire}}</td>
        <td>{{$plan->date_sortie}}</td>
        <td><?php echo substr($plan->commentaire,0,30); if(strlen($plan->commentaire)>30)echo "...";?></td>
        <td>
            <?php if(count(glob("document/plans/$plan->id")) === 0){ ?>
                Absent
            <?php }else{?>
                <a href="/plan/{{$plan->id}}/download" class="btn btn-default">Telecharger</a>

            <?php } ?>
        </td>
        <td>
            {!! Form::open(array('url' => "/plan/$plan->id",'method'=>'DELETE' )) !!}
            <a href="/plan/{{$plan->id}}/edit">
                <button type="button" class="btn btn-success" >

                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>

                </button>
            </a>
            <a href="/plan/{{$plan->id}}">
                <button type="button" class="btn btn-info">

                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>

                </button>
            </a>

            <!-- pour suppression-->




            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$plan->id}}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">suppression du plan</h4>
                        </div>
                        <div class="modal-body">
                            voulez-vous supprimé Plan {{$plan->reference}}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Oui</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end dial suppression -->
            {!! Form::close() !!}


        </td>

    </tr>
    @endforeach
</table>
{!! $plans->render() !!}

