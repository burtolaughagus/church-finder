@extends('layouts.app')

@section('content')
<div id="debug"></div>
<div class="container">
    <div class="row">
        <div align="center"><h3>{!! $msg or '' !!}</h3></div>
        <div class="col-md-10 col-md-offset-1">
            <h4>Edit Church Meeting Times</h4>
            @include('admin.church_menu')
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel panel-default" style="background-color: #f2f2f2;">
            <form action="{{ URL::to('admin/church/edit/' . $church->id . '/tag/') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table>
                    <tr>
                        <td colspan="2"><h4>Create New Meeting Time</h4></td>
                    </tr><tr>
                        <td class="form_cell_label">Day of Week</td>
                        <td class="text form_cell">
                        {{ Form::select('day_of_week', [
                        0 => 'Sunday', 
                        1 => 'Monday', 
                        2 => 'Tuesday',
                        3 => 'Wednesday',
                        4 => 'Thursday',
                        5 => 'Friday',
                        6 => 'Saturday',
                        ], old('day_of_week')) }}</td>
                    </tr><tr>
                        <td class="form_cell_label">Time</td>
                        <td class="text form_cell"><input type="text" name="time" value="{{ old('time') }}" /></td>
                    </tr><tr>
                        <td class="form_cell_label">Service Languages</td>
                        <td class="text form_cell"></td>
                    </tr><tr>
                        <td class="form_cell_label">Address</td>
                        <td class="text form_cell"></td>
                    </tr><tr>
                        <td class="form_cell_label">&nbsp;</td>
                        <td class="text form_cell"></td>
                    </tr><tr>
                        <td>&nbsp;</td><td class="text form_cell">
                            <button type="submit" class="btn btn-primary">
                                {!! FA::icon('hand-o-right') !!}&nbsp;&nbsp;Save
                            </button>
                        </td>
                    </tr><tr>
                        <td>&nbsp;</td>
                        <td class="text form_cell"><a href="/admin/church">キャンセル</a></td>
                    </tr><tr>
                        <td>&nbsp;</td><td></td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection