@if($errors->has('name'))
    <ul class="alert alert-danger">
        @foreach($errors->get('name') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
{!! Form::open(['route'=>['tasks.store', 'project' => $project->id], 'class'=>'form-inline']) !!}
<td class="first-cell">
    {!! Form::text('name', '', ['placeholder'=>'有什么需要完成的任务么?', 'class'=>'form-control']) !!}
</td>
{{--{!! -- Form::hidden('project', $project->id) !!}--}}
<td class="icon-cell">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-plus"></i>
    </button>
</td>
{!! Form::close() !!}