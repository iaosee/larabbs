<div class="add-reply">
    <div class="form-group">
        <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" id="editor" rows="2" placeholder="说说你的观点." >{{old('reply', $topic->reply)}}</textarea>
    </div>
</div>