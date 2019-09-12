@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['report.update', $dailyReport->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small {{ $errors->has('reporting_time') ? 'has-error' : '' }}">
        {!! Form::input('date', 'reporting_time', $dailyReport->reporting_time->format('Y-m-d'), ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::input('text', 'title', $dailyReport->title, ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        {!! Form::textarea('content', $dailyReport->content,
                            ['rows' => '10', 'cols' => '50',
                            'class' => 'form-control',
                            'placeholder' => '本文'
                            ]) !!}
      <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

