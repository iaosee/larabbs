<div class="add-reply">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="form-group">
            <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}" id="editor" rows="2" placeholder="说说你的想法." >{{old('reply', $topic->reply)}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary form-submit-button">回复</button>
        </div>
    </form>
</div>