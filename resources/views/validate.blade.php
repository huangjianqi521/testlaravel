<input name="_tabken" value="{{csrf_token()}}" type="hidden">
<form action="/blog/public/validate" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label>标题</label>
        <input name="title" type="text" class="form-control" placeholder="这里是标题">
    </div>
    <div class="form-group">
        <label>内容</label>
        <textarea id="content" name="content" class="form-control" placeholder="这里是内容"></textarea>
    </div>
    <button type="submit" class="">提交</button>
</form>


