@foreach ($langs as $lang)
    <div class="form-group">
        <label for="">{{ __($name) }} ({{ __($lang) }})</label>
        {{ Form::$type( "{$name}[{$lang}]" , $model ? $model->getTranslation( $name , $lang ) : null , ['class' => 'form-control', 'required' => $required, 'rows' => '3'] ) }}
    </div>
@endforeach
