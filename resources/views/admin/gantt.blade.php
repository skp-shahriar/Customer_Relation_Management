@extends('layouts.app')
@section('page_title')
<span>Gantt</span>
@endsection
@section('content')
<script src="{{ asset('js/daypilot-all.min.js') }}" type="text/javascript"></script>


<div id="dp"></div>



<script type="text/javascript">
    const dp = new DayPilot.Gantt("dp");
    dp.startDate = "2021-10-01";
    dp.days = 31;
    dp.init();
    loadTasks();
    function loadTasks() {
        dp.tasks.load("https://mocki.io/v1/22a7ee80-d215-411f-b844-bd0a6e3ac971");
    }
</script>
@endsection