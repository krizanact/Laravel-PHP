@extends('layouts.app')

@section('content')

    <h2>Upload new document</h2>
    {!! Form::open(['action' => ['FunctionController@update', $document->id],'method' => 'POST','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$document->title,['class' => 'form-control', 'placeholder' => 'Title','name'=>'title'])}}
        <br>

        <table>
            <tr>
                <td>
                    <p>
                         Type :
                    </p>
                    <div class="form-group">
                        {{Form::file('doc_upload'),['name'=>'doc_upload']}}
                    </div>
                </td>

                <td>

                    <p>
                        Document Type :
                    </p>

                    {{ Form::select('doc_type',[
                                              $document->doc_type=> $document->doc_type,'Available Documents:'=>['Personal_ID'=>'Personal ID','Driving License'=>'Driving License','Residence Confirmation'=>'Residence Confirmation','Birth Certificate'=>'Birth Certificate'],
                                             ],'default',['name'=>'doc_type'])
                                             }}
                </td>
            </tr>
        </table>
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}

@endsection






