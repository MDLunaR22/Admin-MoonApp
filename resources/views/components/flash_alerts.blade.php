@if (session('success'))
    @component('components.alert')
        @slot('class', 'success')
        @slot('name', 'Success')
        @slot('message', session('success'))
    @endcomponent
@endif
@if (session('error'))
    @component('components.alert')
        @slot('class', 'danger')
        @slot('name', 'Error')
        @slot('message', session('error'))
    @endcomponent
@endif