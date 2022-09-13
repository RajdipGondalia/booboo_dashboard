@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <!-- <li>{{ $error }}</li> -->
                <div class=" validation-alert-title alert alert-danger self-end bg-red-100 mb-2" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        </ul>
    </div>
@endif

