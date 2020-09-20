

<div class="form-group">
    <label for="">الاسم</label>
    {{ Form::text('name', null , ['class' => 'form-control','required' => true, 'placeholder' => '-- الاسم --']) }}
</div>


<div class="form-group">
    <label for="">الايميل</label>
    {{ Form::text('email', null , ['class' => 'form-control','required' => true, 'placeholder' => '-- الايميل --']) }}
</div>


<div class="form-group">
    <label for="">رقم الموبايل</label>
    {!! Form::text('mobile', null, ['min' => '8', 'class' => ' form-control', 'placeholder' => '-- رقم الموبايل --']) !!}
</div>


<div class="form-group">
    <label for="">تاريخ الميلاد</label>
    {!! Form::date('date_of_birth', null, ['class' => ' form-control', 'placeholder' => '-- تاريخ الميلاد --']) !!}
</div>

<div class="form-group">
    <label for="">{{ __('المحافظه') }}</label>
    {{ Form::select('governorate_id', $governorates , null , ['class' => 'form-control', 'required' => true, 'placeholder' => '-- المحافظات --']) }}
</div>

<p>الجنس</p>
<input type="radio" id="male" name="gender" value="M"  @isset($teacher) ? @if($teacher['gender'] == 'M') checked="checked" @endif @endisset>
<label for="male">ذكر</label><br>
<input type="radio" id="female" name="gender" value="F" @isset($teacher) ? @if($teacher['gender'] == 'F') checked="checked" @endif @endisset>
<label for="female">انثي</label><br>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($teacher) ? 'Update' : 'Create' }}</button>
</div>

