<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#reportModal-{{$pengaduan->id}}" href="#">
    <span class="fa fa-book fa-fw"></span>
</a>                  
    <!-- Modal show report comment form -->
<div class="modal fade" id="reportModal-{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="reportModal-{{ $pengaduan->id }}">
    @if(Request::segment(2) === 'pengaduan-disetujui-report' or Request::segment(2) === 'pengaduan-disetujui-report-disetujui' or Request::segment(2) === 'pengaduan-disetujui-report-ditolak')
        @include('final_report.report_page')
    @else
       @if(is_null($pengaduan->report))
            @include('final_report.report_modal')
        @else
            @include('final_report.report_page')
       @endif
    @endif
</div>