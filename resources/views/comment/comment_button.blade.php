<a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#commentModal-{{$pengaduan->id}}" href="#">
    <span class="fa fa-comment fa-fw"></span>
</a>                  
<!-- Modal show pengaduan comment form -->
<div class="modal fade" id="commentModal-{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="commentModal-{{ $pengaduan->id }}">
    @include('comment.comment_modal')
</div>