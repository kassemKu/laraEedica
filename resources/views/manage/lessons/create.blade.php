@extends('manage.layouts.app')

@section('title', 'Create Lesson')
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary">اضافة درس جديد</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      @if(count($course->lessons) >= 0)
      <li>
        <a href="{{ route('courses.show', $course->id) }}" class="uk-text-small">
          {{ $course->title }}
        </a>
      </li>
      @endif
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
    <form class="uk-form-stacked uk-padding" method="POST" action="{{ route('lessons.store', ['course_id' => $course->id]) }}" enctype="multipart/form-data" novalidate>
      @csrf

      <legend class="uk-legend uk-text-muted">اضافة درس جديدة</legend>

      <div class="uk-flex uk-flex-center uk-grid-small uk-margin" uk-grid>
        <div class="uk-width-1-2@s">
          <label class="uk-form-label uk-text-primary {{ $errors->has('title') ? ' uk-text-danger' : '' }}">
            عنوان الدرس
          </label>
          <div class="uk-width-1-1 uk-inline">
            <span class="uk-form-icon uk-text-primary uk-background-muted ee-border uk-border-rounded
            {{ $errors->has('title') ? ' uk-text-danger' : '' }}"
            uk-icon="icon: pencil">
            </span>
            <input
            id="title" type="text"
            v-model="courseTitle"
            class="uk-input uk-border-rounded
            {{ $errors->has('title') ? ' uk-form-danger' : '' }}"
            name="title"
            value="{{ old('title') }}"
            placeholder="عنوان الدرس"
            required autofocus>
          </div>
          @if ($errors->has('title'))
          <span class="uk-text-small uk-text-danger">{{ $errors->first('title') }}</span>
          @endif
        </div>{{-- Column Title --}}

        <div class="uk-width-1-2@s">
          <label class="uk-form-label uk-text-primary">
            رابط الدرس
          </label>
          <div class="uk-width-1-1 uk-inline">
            <span class="uk-form-icon uk-text-primary uk-background-muted ee-border uk-border-rounded"
            uk-icon="icon: link">
            </span>
            <input
            id="slug"
            type="text"
            class="uk-input uk-border-rounded"
            name="slug"
            :value="courseSlug(courseTitle)"
            placeholder="رابط الدرس">
          </div>
        </div>{{-- Column Slug --}}
      </div>{{-- Grid Title And Slug --}}

      <div class="uk-margin uk-margin-small-left">
        <label class="uk-form-label uk-text-primary">
          الوصف
        </label>
        <textarea class="uk-textarea uk-border-rounded" rows="5" name="description"
        placeholder="الوصف لا يزيد عن 255 محرف...">
        </textarea>
      </div>

      <div class="uk-margin uk-margin-small-left">
        <label class="uk-form-label uk-text-primary">
          نص الدرس
        </label>
        <textarea class="uk-textarea uk-border-rounded" rows="10" name="lesson_content"
        placeholder="الدرس هنا...">
        </textarea>
        {{-- <vue-editor v-model="editorText"></vue-editor>
        <input type="hidden" name="lesson_content" :value="editorText"> --}}
      </div>

      @if(!$course->free_course)
      <div class="uk-margin">
        <label>
          <input class="uk-checkbox" type="checkbox" name="free_lesson">
          درس مجاني
        </label>
      </div>
      @endif
      
      <div class="uk-flex uk-flex-center uk-grid-small uk-margin" uk-grid>
        <div class="uk-width-1-2">
          <label class="uk-form-label uk-text-primary">
            رقم الدرس في الدورة
          </label>
          <input
          id="position"
          type="text"
          class="uk-input uk-border-rounded uk-width-1-2"
          name="position"
          placeholder="رقم الدرس في الدورة">
        </div>

        <div class="uk-width-1-2">
          <label class="uk-form-label uk-text-primary">
            تصنيف الدرس
          </label>
          <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-radio" type="radio" name="type" value="video" checked>  فيديو</label>
            <label><input class="uk-radio" type="radio" name="type" value="sound"> صوتي</label>
            <label><input class="uk-radio" type="radio" name="type" value="text"> نصي</label>
          </div>
        </div>
      </div>

      <div class="uk-margin">
        <div uk-form-custom="target: true">
            <label class="uk-form-label uk-text-primary">
              اختر فيديو الدرس
            </label>
          <input type="file" name="lesson_video">
          <input class="uk-input" type="text" placeholder="اختر فيديو" disabled>
        </div>
      </div>

      @if($course->publish)
      <div class="uk-margin">
        <label class="uk-text-small uk-text-primary">
          <input class="uk-checkbox" type="checkbox" name="publish">
          نشر الدرس
        </label>
      </div>
      @endif

      <div>
        <button
        type="submit"
        class="uk-button uk-button-default ee-border-blue uk-width-1-1 uk-margin-top uk-border-rounded">
        اضافة الدرس
        </button>
      </div>

    </form>
  </div>
</div>
@endsection
