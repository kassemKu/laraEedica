@extends('manage.layouts.app')

@section('title', $course->title)
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary ee-en">{{ $course->title }}</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li>
        <a href="{{ route('courses.index') }}" class="uk-text-small">ادارة الدورات</a>
      </li>
      <li class="uk-disabled uk-text-small">
        <a href="#" class="uk-disabled uk-text-small ee-en">{{ $course->title }}</a>
      </li>
    </ul>
  </div>
</div>

<div class="uk-height-medium uk-flex uk-flex-bottom uk-background-cover ee-border uk-background-blend-multiply uk-background-secondary"
  data-src="{{ $course->hasMedia('course_img') ? $course->getFirstMediaUrl('course_img', 'banner') : asset('img/course.jpg') }}"
  data-sizes="(min-width: 650px) 450px, 100vw" uk-img>
    <p class="uk-article-meta uk-padding-small uk-padding-remove-vertical">
      <div class="uk-text-small uk-light">
        عدد دروس الدورة :
        <span class="ee-en uk-text-danger">{{ count($course->lessons)}}</span>
      </div>
    </p>
</div>

<div class="uk-container uk-padding" style="z-index: 980;" uk-sticky="bottom: #offset">
  <article class="uk-article">

    <div class="uk-grid-small" uk-grid>
      <div class="uk-width-2-3">
        <h1 class="uk-article-title">
          <a class="uk-link-reset ee-en" href="$">{{ $course->title }}</a>
        </h1>
      </div>

      <div class="uk-width-1-3">
        <a href="{{ route('lessons.create', $course->id) }}" class="uk-button uk-button-default uk-border-rounded uk-float-left">
          <span uk-icon="icon: plus" class="uk-margin-small-left"></span>
          أضافة درس جديد
        </a>
      </div>
    </div>

    <p class="uk-article-meta">تأليف الأستاذ:
      <a href="{{ route('users.show', $teacher->id) }}" class="uk-text-primary ee-en">{{ $teacher->name }}</a>
      <span class="uk-margin-right">تم النشر يتاريخ:
        <span class="ee-en uk-text-primary">{{ $course->created_at->toFormattedDateString() }}</span>
      </span>
      @if($course->publish)
        <span class="uk-margin-right uk-text-success">الدورة في النشر</span>
      @else
        <span class="uk-margin-right uk-text-danger">الدورة لم تنشر بعد</span>
      @endif
      @if($course->free_course)
        <span class="uk-margin-right uk-label uk-background-muted ee-border uk-text-success">دورة مجانية</span>
      @else
        <span class="uk-margin-right">ثمن الدورة: </span>
        <span class="uk-label uk-background-muted ee-border ee-en uk-text-danger">{{ $course->price }} $</span>
      @endif
    </p>

    <p class="uk-text-lead uk-margin-large">{{ $course->description }}</p>

    <h4 class="uk-text-muted">دروس الدورة</h4>
    <div class="uk-child-width-1-3@s" uk-grid>
      @foreach($lessons as $lesson)
      <div>
        <div class="uk-panel uk-background-default uk-padding-small ee-border">
          <span class="uk-position-absolute uk-label ee-en"  style="left: 10px; top: 10px">
            {{ $lesson->position }}
          </span>
          <h4 class="uk-margin-top ee-en">{{ $lesson->title }}
            <span class="uk-text-small uk-text-primary ee-en">{{ $lesson->type }}</span>
          </h4>
          <p class="uk-text-small ee-en">{{ $lesson->description }}</p>
          <div class="uk-child-width-auto" uk-grid>
            <a href="{{ route('lessons.show', $lesson->slug) }}" class="uk-text-small">
              <span uk-icon="arrow-left"></span>
              المزيد من التفاصيل
            </a>
            @if($course->publish)
              @if(!$lesson->publish)
              <span class="uk-label ee-border uk-label-danger uk-text-small">غير منشور</span>
              @endif
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </article>
</div>
@endsection
