@extends('manage.layouts.app') 

@section('title', 'Manage Permissions')
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small   ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary">ادارة الأذونات</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li>
        <a href="{{ route('manage.dashboard') }}" class="uk-text-small">لوحة التحكم</a>
      </li>
      <li ><a href="#" class="uk-disabled uk-text-small">ادارة الأذونات</a></li>
    </ul>
  </div>
</div>

<div class="uk-container uk-padding">
  <div class="uk-overflow-auto uk-background-default ee-border">
    <div class="uk-grid-small uk-child-width-1-2 uk-padding" uk-grid>
      <div>
        <input class="uk-input uk-width-1-1 uk-border-rounded" type="text" placeholder="أدخل اسم الأذن هنا">
      </div>
      <div class="uk-text-left">
        <a href="{{ route('permissions.create') }}" class="uk-button uk-button-default uk-border-rounded">
          <span uk-icon="icon: plus" class="uk-margin-small-left"></span>
          أضف أذنا جديدا
        </a>
      </div>
    </div>
    
    <div class="uk-flex uk-flex-middle uk-flex-center">
      <div>
        <h4>فلترة نتائج البحث</h4>
        <p class="uk-text-small uk-text-muted">
          يمكن فلترة ابحث في التصاريح بحسب اسم الأذن
        </p>
      </div>
    </div>
    
    <table class="uk-table uk-table-hover uk-table-divider">
      <thead>
        <tr>
          <th class="uk-table-shrink">ID</th>
          <th class="uk-table-shrin">اسم الأذن</th>
          <th>الاسم المستخدم</th>
          <th>الوصف</th>
          <th>تاريخ التسجيل</th>
          <th>المهام</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($permissions as $permission)
        <tr class="uk-text-small">
          <td class="uk-text-danger ee-en">{{ $permission->id }}</td>
          <td class="ee-en">{{ $permission->name }}</td>
          <td class="ee-en">{{ $permission->display_name }}</td>
          <td class="ee-en">{{ $permission->description }}</td>
          <td  class="ee-en">{{ $permission->created_at }}</td>
          <td>
            <a href="{{ route('permissions.edit', $permission->id) }}" class="uk-label uk-background-default ee-border ee-border uk-text-warning">
              تعديل
            </a>
            <a href="{{ route('permissions.show', $permission->id) }}" class="uk-label uk-background-default ee-border ee-border-blue uk-text-primary">
              عرض
            </a>
            <a class="uk-label uk-background-default ee-border ee-border-red uk-text-danger">حذف</a>
          </td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection