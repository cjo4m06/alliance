<a class="ui blue ribbon label">建立日期：{{ $model->created_at }}（{{ $model->created_at->diffForHumans() }}）</a>
<p></p>
<a class="ui teal ribbon label">最後更新：{{ $model->updated_at }}（{{ $model->updated_at->diffForHumans() }}）</a>
<p></p>
