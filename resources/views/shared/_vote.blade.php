@if($model instanceof App\Question)
  @php
    $name = 'question';
    $firstURISegment = 'questions';
  @endphp
@elseif($model instanceof App\Answer)
  @php
    $name = 'answer';
    $firstURISegment = 'answers';
  @endphp
@endif

@php
  $formId = $name . "-" . $model->id;
  $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp

<div class="d-fex flex-column vote-controls">
    <a title="This {{$name}} is useful"
    class = "vote-up {{Auth::guest() ? 'off' : ''}}"
    onclick = "event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>
    <form id="up-vote-{{ $formId }}" action="{{$formAction}}" method="POST" style="display:none;">
        <input type="hidden" name="vote" value="1">
        @csrf
    </form>
    <span class="votes-count">{{$model->votes_count}}</span>
    <a title="This {{$name}} is not useful"
    class="vote-down off {{Auth::guest() ? 'off' : ''}}"
    onclick = "event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>
    <form id="down-vote-{{ $formId }}" action="{{$formAction}}" method="POST" style="display:none;">
        <input type="hidden" name="vote" value="-1">
        @csrf
    </form>
    @if($model instanceof App\Question)
      <favorite :question="{{ $model }}"></favorite>
    @elseif($model instanceof App\Answer)
      <accept-answer :answer="{{ $model }}"></accept-answer>
    @endif
</div>
