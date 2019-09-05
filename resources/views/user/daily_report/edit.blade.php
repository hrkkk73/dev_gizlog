@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['report.update', $dailyreport->id], 'method' => 'PUT']) !!}
      <input class="form-control" name="user_id" type="hidden" value="{{ $dailyreport->user_id }}">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date" value="{{ $dailyreport->reporting_time }}">
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text" value="{{ $dailyreport->title }}">
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="本文" name="content" cols="50" rows="10">{{ $dailyreport->content }}</textarea>
      <span class="help-block"></span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

