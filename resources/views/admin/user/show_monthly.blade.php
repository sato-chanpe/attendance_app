@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>【{{$user->id}}】{{$user->name}} / {{ $y }}年{{ $m }}月分</h2>
    <h3>勤務日数計：{{ count($attendances) }}日</h3>
    <h3>勤務時間計：{{ getFormatedDatetimeFromMinutes($user->getMonthlyTotalWorkingMinutes($y, $m)) }}</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>日付</th>
            <th>出社</th>
            <th>退社</th>
            <th>勤務時間</th>
          </tr>
        </thead>
        <tbody>
          @foreach($attendances as $attendance)
            <tr>
                <th scope="row">{{ $attendance->attend_time->formatLocalized('%d日 / %a') }}</th>
                <td>{{ $attendance->attend_time }}</td>
                <td>{{ $attendance->leave_time }}</td>
                <td>{{ getFormatedDatetimeFromMinutes($attendance->working_minutes) }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection