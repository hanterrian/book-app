@php
    $class = $attributes->get('class','w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800');
    $inputName = $attributes->get('name');

    $errorClass = '';

    $messages = $errors->getMessageBag()->getMessages();

    if(count(Arr::get($messages, $inputName ,[]))) {
        $class .= $errorClass;
    }
@endphp
<div class="flex items-start mb-6">
    <div class="flex items-center h-5">
        <input {{ $attributes->merge(['class'=>$class]) }}/>
    </div>
    <label for="{{ $attributes->get('id') }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
    @error($inputName)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
