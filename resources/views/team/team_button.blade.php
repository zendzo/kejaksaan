<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#teamModal-{{$pengaduan->id}}" href="#">
    <span class="fa fa-tasks fa-fw"></span>
</a>                  
<!-- Modal show pengaduan comment form -->
<div class="modal fade" id="teamModal-{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="teamModal-{{ $pengaduan->id }}">
    @include('team.team_modal')
</div>