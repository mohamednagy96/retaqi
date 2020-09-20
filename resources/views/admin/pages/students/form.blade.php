<div class="form-group">
    <label for="">الاسم</label>
    {{ Form::text('name', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">الايميل</label>
    {{ Form::text('email', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
<label for="">تاريخ الميلاد</label>
    {{ Form::date('date_of_birth', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
<label for="">الموبايل</label>
    {{ Form::number('mobile', null , ['class' => 'form-control','required' => true]) }}
</div>
<p>الجنس</p>
<input type="radio" id="male" name="gender" value="M"  @isset($student) ? @if($student['gender'] == 'M') checked="checked" @endif @endisset>
<label for="male">ذكر</label><br>
<input type="radio" id="female" name="gender" value="F" @isset($student) ? @if($student['gender'] == 'F') checked="checked" @endif @endisset>
<label for="female">انثي</label><br>

<div class="form-group">
    <label for=""> الوقت المتاح يبدء من</label>
    {{ Form::time('avaliable_time_from', null , ['class' => 'form-control','required' => true]) }}
</div>
<div class="form-group">
    <label for="">الوقت المتاح ينتهي </label>
    {{ Form::time('avaliable_time_to', null , ['class' => 'form-control','required' => true]) }}
</div>

<div class="form-group">
    <label for="">المجموعه</label>
    {{ Form::select('group_id',$group ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- المجموعه --']) }}
</div>
<div class="form-group">
    <label for="">اليوم</label>
    {{ Form::select('day_id',$day ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- الايام --']) }}
</div>
<div class="form-group">
    <label for=""></label>
    {{ Form::select('teacher_id',$teacher ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- المعلمين --']) }}
</div>
<div class="form-group">
    <label for="">المحافظه</label>
    {{ Form::select('governorate_id',$governorate ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => '-- المحافظه --']) }}
</div>


</br>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ isset($student) ? 'تعديل' : 'اضافه' }}</button>
</div>
