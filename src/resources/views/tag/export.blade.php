{!! $lists->render() !!}
<br>
<table class="table table-striped">
    <tr>
        <th>name</th>
    </tr>
    @foreach($lists as $list)
    <tr>
        <td>{{$list->name}}</td>
    </tr>
    @endforeach
</table>
<p><a class="btn btn-primary" href="{{url('/tag/download1')}}" target="_blank"> CSV download その1</a></p>
