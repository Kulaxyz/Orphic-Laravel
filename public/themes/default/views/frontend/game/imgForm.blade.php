@extends(Theme::getLayout())
@section('content')

    {!! Form::open(array('url'=>'store/img', 'enctype' => "multipart/form-data", 'id'=>'form-game', 'role'=>'form', 'files' => true )) !!}
    <input type="file" name="images[]" multiple="multiple">
        <input type="number" value="3" name="game_id">
        <input type="number" name="order">
        <input type="submit" value="Send!">
    {!! Form::close() !!}
@endsection