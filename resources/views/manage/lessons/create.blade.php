@extends('manage.layouts.app')

@section('title', 'Create Courses')
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary">اضافة دورة</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li>
        <a href="{{ route('lessons.index') }}" class="uk-text-small">
          ادارة الدروس
        </a>
      </li>
      <li>
        <a href="#" class="uk-disabled uk-text-small">
          اضافة درس جديد
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="uk-container uk-margin-medium uk-flex uk-flex-center" id="ee-create">
  <div class="uk-card uk-card-default uk-width-3-4@s ee-border">
    <form class="uk-form-stacked uk-padding" method="POST" action="{{ route('lessons.store') }}" enctype="multipart/form-data" novalidate>
      @csrf
      
      <legend class="uk-legend uk-text-muted">اضافة درس جديدة</legend>
      
      

    </form>
  </div>
</div>
@endsection