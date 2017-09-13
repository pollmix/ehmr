@extends('admin.layouts.master')

@section('content')

    @if ($diagnosis->count())
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Diagnosis</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Recommended For</th>

                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($diagnosis as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->recommended_for }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.diagnosis.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.diagnosis.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $diagnosis->links() }}

        <div class="text-md-center">{!! link_to_route(config('quickadmin.route').'.diagnosis.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-default')) !!}</div>

    @else
        {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
    @endif

@endsection