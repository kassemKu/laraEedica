@extends('manage.layouts.app')

@section('title', 'Create Permission')
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary">اضافة أذن</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li class="uk-text-small">
        <a href="{{ route('permissions.index') }}">
          ادارة الأذونات
        </a>
      </li>
      <li class="uk-disabled uk-text-small">
        <a href="#">
          اضافة أذنا جديد
        </a>
      </li>
    </ul>
  </div>
</div>

<div class="uk-container uk-padding" id="createUser">
  <div class="uk-background-default ee-border">
    
    <form action="{{ route('permissions.store') }}" class="uk-padding" method="POST">
      @csrf
      <fieldset class="uk-fieldset">
        
        <legend class="uk-legend uk-text-muted">بيانات الأذن</legend>
        
        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
          <label>
            <input class="uk-radio" v-model="permissionType" name="permission_type" value="crud" type="radio" name="permission_type">
            أذن بصلاحيات
          </label>
          <label>
            <input class="uk-radio" v-model="permissionType" name="permission_type" value="basic" type="radio" name="permission_type">
            أذن أساسي
          </label>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-1-2@s" uk-grid>
          <div v-if="permissionType == 'basic'">
            <label class="uk-form-label uk-text-primary {{ $errors->has('name') ? ' uk-text-danger' : '' }}">
              الاسم
            </label>
            <div class="uk-width-1-1 uk-inline">
              <span class="uk-form-icon uk-background-muted ee-border uk-border-rounded uk-text-primary {{ $errors->has('name') ? ' uk-text-danger' : '' }}" uk-icon="icon: pencil; ratio: 1.1">
              </span>
              <input
              id="name"
              type="name"
              class="uk-input uk-border-rounded
              {{ $errors->has('name') ? ' uk-form-danger' : '' }}"
              name="name"
              v-model="permissionName"
              placeholder="الاسم"
              value="{{ old('name') }}"
              required autofocus>
            </div>
            @if ($errors->has('name'))
            <span class="uk-text-small uk-text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>{{-- Namel --}}

          <div v-if="permissionType == 'basic'">
            <label class="uk-form-label uk-text-primary">
              الاسم المستخدم
            </label>
            <div class="uk-width-1-1 uk-inline">
              <span class="uk-form-icon uk-background-muted ee-border uk-border-rounded uk-text-primary {{ $errors->has('display_name') ? ' uk-text-danger ee-border-red' : '' }}" uk-icon="icon: tag">
              </span>
              <input
                id="display_name"
                type="text"
                class="uk-input uk-border-rounded"
                name="display_name"
                :value="permissionSlug(permissionName)"
                placeholder="الاسم المستخدم"
                
              >
            </div>
          </div>{{-- Basic Permission --}}

          <div v-if="permissionType == 'crud'">
            <label class="uk-form-label uk-text-primary">
              اسم المصدر
            </label>
            <div class="uk-width-1-1 uk-inline">
              <span class="uk-form-icon uk-background-muted ee-border uk-border-rounded uk-text-primary" uk-icon="icon: pencil; ratio: 1.1">
              </span>
              <input
                id="resource"
                v-model="resource"
                type="text"
                class="uk-input uk-border-rounded"
                name="resource"
                placeholder="اسم المصدر"
                value=""
                autofocus
              >
            </div>
          </div>{{-- Curd Permission --}}
        </div>

        <div class="uk-margin" v-if="permissionType == 'basic'">
          <label class="uk-form-label uk-text-primary">
            الوصف
          </label>
          <textarea class="uk-textarea uk-border-rounded" rows="5" name="description"
          placeholder="الوصف لا يزيد عن 255 محرف..."
          value="{{ old('description') }}">
          </textarea>
        </div>

        {{-- Curd Permission --}}
        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid" v-if="permissionType == 'crud'">
          <label class="ee-en">
            <input class="uk-checkbox" type="checkbox" v-model="crudSelected" value="create">
            Create
          </label>
          <label class="ee-en">
            <input class="uk-checkbox" type="checkbox" v-model="crudSelected" value="update">
            Update
          </label>
          <label class="ee-en">
            <input class="uk-checkbox" type="checkbox" v-model="crudSelected" value="read">
            Read
          </label>
          <label class="ee-en">
            <input class="uk-checkbox" type="checkbox" v-model="crudSelected" value="delete">
            Delete
          </label>

          <input type="hidden" name="crud_selected" :value="crudSelected">
        </div>

        <table class="uk-table uk-table-divider"
          v-if="resource.length >= 3 && crudSelected.length > 0">
          <thead>
            <th>الاسم</th>
            <th>الاسم المستخدم</th>
            <th>الوصف</th>
          </thead>
          <tbody>
            <tr v-for="item in crudSelected">
              <td class="ee-en" v-text="crudName(item)"></td>
              <td class="ee-en" v-text="crudSlug(item)"></td>
              <td class="ee-en" v-text="crudDescription(item)"></td>
            </tr>
          </tbody>
        </table>

        <div class="uk-margin-small-left">
          <button
          type="submit"
          class="uk-button uk-button-default ee-border-blue uk-border-rounded uk-width-1-1 uk-margin-top">
          اضافة الأذن
        </button>
      </div>
      
    </fieldset>
  </form>
  
</div>
</div>
@endsection