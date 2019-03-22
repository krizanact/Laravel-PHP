@extends('layouts.app')

@section('content')
    <h2>Upload new document</h2>

    {!! Form::open(['action' => ['FunctionController@store'],'method' => 'POST','enctype'=>'multipart/form-data','id'=>'data'])!!}

    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title','name'=>'title'])}}

        <table>
            <tr>
                <td>
                    <div class="form-group">
                        {{Form::file('doc_upload')}}
                    </div>
                </td>

                <td>

                    <p>
                        Document Type :
                    </p>


                    {{ Form::select('doc_type',[
                                  null=>'Select Document Type: ','Available Documents'=>['Personal_ID'=>'Personal ID','Driving License'=>'Driving License','Residence Confirmation'=>'Residence Confirmation','Birth Certificate'=>'Birth Certificate'],
                                 ],'default',['name'=>'doc_type'])
                                 }}
                </td>
            </tr>
        </table>
    </div>


    {{Form::submit('Submit', ['class'=>'btn-submit btn btn-success' ,'type' =>'submit'])}}
    {!! Form::close() !!}


    @endsection





