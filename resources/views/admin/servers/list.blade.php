@php($title = __('servers.title_servers_list') )

@extends('layouts.main')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">GameAP</a></li>
        <li class="breadcrumb-item active">{{ __('servers.game_servers') }}</li>
    </ol>
@endsection

@section('content')
    <div class="page-list-menu mb-3">
        <a class='btn btn-success' href="{{ route('admin.servers.create') }}">
            <span class="fa fa-plus-square"></span>&nbsp;{{ __('servers.create') }}
        </a>
    </div>

    @include('components.grid', [
        'modelsList' => $servers,
        'labels' => [__('servers.name'), __('servers.game'), __('servers.ip_port')],
        'attributes' => ['name', 'game.name', ['twoSeparatedValues', ['server_ip', ':', 'server_port']]],
        // 'viewRoute' => 'admin.servers.show',
        'editRoute' => 'admin.servers.edit',
        'destroyRoute' => 'admin.servers.destroy',
        'destroyConfirmAction' => '',
    ])

    {!! $servers->links() !!}
@endsection

@section('footer-scripts')
    <script>
        let confirmed = false;

        document.addEventListener('click', function(event) {
            if (event.target.closest('.btn-delete') && !confirmed) {
                event.preventDefault();
                const promptOptions = {
                    title: '{{ __('servers.delete_confirm_msg') }}',
                    value: [],
                    buttons: {
                        confirm: {
                            label: '{{ __('main.yes') }}',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: '{{ __('main.no') }}',
                            className: 'btn-danger'
                        }
                    },
                    inputType: 'checkbox',
                    inputOptions: [{
                        text: '{{ __('servers.delete_files') }}',
                        value: 'delete_files'
                    }],
                    callback: function (result) {
                        if (result) {
                            if (result.includes('delete_files')) {
                                const hiddenInput = document.createElement('input');
                                hiddenInput.type = 'hidden';
                                hiddenInput.value = 'delete_files';
                                hiddenInput.name = 'delete_files';
                                event.target.parentNode.appendChild(hiddenInput);
                            }

                            confirmed = true;
                            event.target.dispatchEvent(new MouseEvent(event.type));
                        }
                    }
                };
                bootbox.prompt(promptOptions);
            }

            confirmed = false;
        });
    </script>
@endsection
