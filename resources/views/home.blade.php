@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-100%">
            <div class="card">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>


                    @endif
                        <div class="row justify-content-center">
                    You are logged in!
                        </div>


                </div>
                @if(count($documents)==0)
                    <div class="card-body">
                    <div class="row justify-content-center">
                    <p>You don't have any documents uploaded here.</p>
                    </div>
                       <div class="row justify-content-center">
                           <a href="/documents/create" class="btn btn-primary">Upload new document</a>
                       </div>

                @else



                <table class="table table-striped">
                    <tr>
                        <td>List of your uploaded documents:</td>
                        <td></td>
                        <td></td>
                    </tr>

                @foreach($documents as $document)
                        <tr>
                            <td>

                                <h3>{{$document->title}}</h3>
                               Document type: <br>
                                <ul><li>{{$document->doc_type}} </li></ul>

                               <div class="decorate"><a href="storage/doc_upload/{{$document->doc_upload}}" download="{{$document->doc_upload}}">{{$document->doc_upload}}</a> </div> <br>

                                <small>Written on {{$document->created_at}} by {{$document->user->name}}</small><br>
                            </td>
                            <td>
                                <a href="/documents/{{$document->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>


                                <!-- Bootstrap code/Modal Window -->

                                <button type="button" class="btn btn-danger btn-submit" data-toggle="modal" data-target="#myModal{{$document->id}}">Delete</button>

                                <!-- Modal content-->

                                <div id="myModal{{$document->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">


                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"> </h4>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this document ?</h5>

                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['action'=> ['FunctionController@destroy',$document->id], 'method' =>'POST', 'class' => 'pull-right']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Yes', ['class'=> 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </td>
                        </tr>

                    @endforeach



                    <div class="row justify-content-center">
                        <a href="/documents/create" class="btn btn-primary">Upload new document</a>
                    </div>

                </table>


                        @endif

            </div>
        </div>
    </div>

</div>
</div>

            </td>
        </tr>
    </table>

</div>


@endsection
