@extends('manage.layouts.app')

@section('title', $lesson->title)
@section('content')
<div class="uk-grid-large uk-child-width-1-2 uk-background-default uk-padding-small ee-border-bottom" uk-grid>
  <div>
    <h3 class="uk-text-primary">تفاصيل الدرس</h3>
  </div>
  <div>
    <ul class="uk-breadcrumb uk-float-left">
      <li>
        <a href="{{ route('courses.show', $lesson->course->id) }}" class="uk-text-small">
          {{ $lesson->course->title }}
        </a>
      </li>
      <li class="uk-disabled uk-text-small">
        <a href="#" class="uk-disabled uk-text-small ee-en">{{ $lesson->title }}</a>
      </li>
    </ul>
  </div>
</div>

<div class="uk-container uk-padding" style="z-index: 980;" uk-sticky="bottom: #offset">
  <article class="uk-article">

    <h1 class="uk-article-title">
      {{ $lesson->title }}
    </h1>

    <p class="uk-article-meta">تأليف الأستاذ:
      <a href="{{ route('users.show', $lesson->course->user->id) }}" class="uk-text-primary ee-en">{{ $lesson->course->user->name }}</a>
      <span class="uk-margin-right">تم النشر يتاريخ:
        <span class="ee-en uk-text-primary">{{ $lesson->created_at->toFormattedDateString() }}</span>
      </span>
      @if($lesson->course->publish)
        @if($lesson->publish)
          <span class="uk-margin-right uk-text-success">الدرس في النشر</span>
        @else
          <span class="uk-margin-right uk-text-danger">الدرس لم ينشر بعد</span>
        @endif
      @endif
      @if($lesson->course->free_course)
      <span class="uk-margin-right uk-label uk-background-muted ee-border uk-text-success">دورة مجانية</span>
      @endif
      @if($lesson->free_lesson && !$lesson->course->free_course)
        <span class="uk-margin-right uk-label uk-background-muted ee-border uk-text-success">درس مجاني</span>
      @endif
    </p>

    <p class="uk-text-lead uk-margin-large">{{ $lesson->description }}</p>
    <p>{{ $lesson->lesson_content }} </p>

    @if($lesson->hasMedia('lesson_video'))
    <video controls  uk-video class="uk-width-1-1 ee-border">
      <source src="{{ $lesson->getFirstMediaUrl('lesson_video')}}" type="video/mp4">
      <source src="{{ $lesson->getFirstMediaUrl('lesson_video')}}" type="video/ogg">
    </video>
    @endif
    
  </article>
</div>
@endsection
