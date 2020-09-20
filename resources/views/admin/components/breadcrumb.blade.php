<section class="content-header">
    <h1>
      {{ $title }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> {{ __("Home") }}</a></li>
      @foreach ($links as $title => $route)
        <li><a href="{{ $route }}"> {{ $title }}</a></li>
      @endforeach

    </ol>
</section>
