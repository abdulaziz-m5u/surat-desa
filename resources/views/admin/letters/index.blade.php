@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Daftar Surat yang mau di cetak') }}
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Letter" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('NIK') }}</th>
                                <th>{{ __('Jenis Surat') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($letters as $letter)
                            <tr data-entry-id="{{ $letter->id }}">
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $letter->nama }}</td>
                                <td>{{ $letter->nik }}</td>
                                <td>
                                    <span class="badge badge-success">
                                     {{ $letter->category->nama_surat }}
                                     </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                    @if($letter->status == 1)
                                        <a target="_blank" href="https://wa.me/6281999483864?text=Surat anda sudah jadi silahkan bisa di ambil ke desa secepatnya" class="btn btn-success">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                        <a href="{{ route('admin.letters.edit', $letter->id) }}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a target="_blank" href="{{ route('admin.letters.show', $letter->id) }}" class="btn btn-warning">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')"  class="d-inline" action="{{ route('admin.letters.destroy', $letter->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Kosong') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.letters.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('zero selected')
        return
      }
      if (confirm('are you sure ?')) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable-Letter:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush