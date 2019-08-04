@extends('_layouts.default')

@section('script-bottom')
    <script>
        function action(method, id = null, name = null)
        {
            //jika edit maka di masukkan nilainya
            // jika buat maka form di kosongkan.
            if(method == 'edit'){
                $('.title').text('Ubah Data');
                $('#name').val(name);
                $('#id').val(id);
            }else if(method == 'create'){
                $('.title').text('Buat Data');
                $('#name').val('');
                $('#id').val('');
            }

            // biar jelas arahnya berdasarkan variable method
            if(method == 'edit' || method == 'create'){
                $('#modal-edit').modal('show');
            }else if(method == 'delete'){
                console.log(id);
                destroy(id, name);
            }
        }

        function send()
        {
            var id      = $('#id').val();
            var name    = $('#name').val();
            var check    = $('#form-guest-group')[0];

            $.ajax({
                url: '{{route("necessity.store")}}',
                type: 'GET',
                cache: false,
                data:{name: name, id: id},
                success:function(result){	
                    console.log(result);

                    if(!check.checkValidity()){
                        check.reportValidity();
                    }else{

                        if(id){
                            var statment = 'Keperluan '+name+' Telah Diperbaharui';
                        }else{
                            var statment = 'Keperluan '+name+' Telah Dibuat';
                        }

                        swal(statment, {
                            icon: "success",
                        }).then((action) => {
                            if (action) {
                                // if success, can refresh this page
                                location.reload();
                            }
                        });
                    }                    
                },
                error:function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError)
                }
            });
        }

        function destroy(id, name)
        {
            swal("Anda Yakin Mau Menghapus Keperluan '"+name+"' ?", {
                icon: "warning",
            }).then((action) => {
                if (action) {
                    $.ajax({
                        url: '{{route("necessity.destroy")}}',
                        type: 'GET',
                        cache: false,
                        data:{id: id},
                        success:function(result){
                             // if success, can refresh this page
                             location.reload();         
                        },
                        error:function(xhr, ajaxOptions, thrownError){
                            console.log(thrownError)
                        }
                    });
                }
            });
        }
    </script>
@endsection

@section('content')
@include('necessity.form')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            <a href="#" onClick="action('create')" class="btn btn-primary float-md-right mt-0">
                <i class="icon-plus3"></i> Tambah
            </a>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">Daftar Keperluan</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            {{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
                            {{-- <li><a data-action="expand"><i class="icon-expand2"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="card-body collapse in">
                    <div class="card-block pb-0">
                        
                    </div>
                </div> --}}
                <!-- <div class="card-body"> -->
                <div class="card-block">
                    <div class="table-responsive bg-white">
                        <table class="table table-sm mb-0 table-bordered table-hover">
                            <thead class="bg-primary bg-lighten text-white">
                                <tr>    
                                    <th width="5px">No</th>
                                    <th>Nama Keperluan</th>
                                    <th width="180" class="text-xs-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td> {{$index + 1}} </td>
                                        <td> {{$item->name}} </td>
                                        <td class="text-xs-center">
                                            <a href="#" onClick="action('edit', {{$item->id}}, '{{$item->name}}')" class="btn btn-sm btn-green">
                                                <i class="icon-pencil3"></i> Edit
                                            </a>
                                            <a href="#"
                                                onClick="action('delete', {{$item->id}}, '{{$item->name}}')"
                                                class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="icon-trash3"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" align="center">Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>

            <div class="card-block pr-0">
                <nav aria-label="Page navigation" class="text-xs-right">
                    
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
