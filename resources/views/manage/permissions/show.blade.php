@extends('manage.layouts.app')

@section('title', $permission->name)
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary ee-en">{{ $permission->name }}</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li>
        <a href="{{ route('permissions.index') }}" class="uk-text-small">
          ادارة التصاريح
        </a>
      </li>
      <li>
        <a href="#" class="uk-disabled uk-text-small ee-en">
          {{ $permission->name }}
        </a>
      </li>
    </ul>
  </div>
</div>

<div class="uk-container uk-flex uk-flex-center uk-padding">
  <div class="uk-background-default ee-border uk-width-2-3@s uk-padding">
    <h3 class="ee-en">
      {{ $permission->name }}
    </h3>
    <div>
      <ul class="uk-list uk-text-right uk-text-small  uk-list-striped">
        <li>
          <span>اسم الأن: </span>
          <span class="ee-en uk-margin-small-right">{{ $permission->name }}</span>
        </li>
        <li>
          <span>الاسم المستخدم: </span>
          <span class="ee-en uk-margin-small-right">{{ $permission->display_name }}</span>
        </li>
        <li>
          <span>الوصف : </span>
          <span class="ee-en uk-margin-small-right">{{ $permission->description }}</span>
        </li>
      </ul>
    </div>
  </div>
  
</div>
@endsection