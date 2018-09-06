<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#invReportModal-{{$pengaduan->id}}" href="#">
    <span class="fa fa-list-ol"></span>
</a>                  
    <!-- Modal show report comment form -->
<div class="modal fade" id="invReportModal-{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="invReportModal-{{ $pengaduan->id }}">
    @if(Request::segment(2) === 'pengaduan-disetujui-report' or Request::segment(2) === 'pengaduan-disetujui-report-disetujui' or Request::segment(2) === 'pengaduan-disetujui-report-ditolak')
        @include('inv_report.report_modal')
    @else
       @if(is_null($pengaduan->invReport))
            @include('inv_report.report_modal')
        @else
            @include('inv_report.report_modal')
       @endif
    @endif
</div>