@php
    $class = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
    $inputName = $attributes->get('for');

    $errorClass = ' text-red-700 dark:text-red-500';

    $messages = $errors->getMessageBag()->getMessages();

    if(count(Arr::get($messages, $inputName ,[]))) {
        $class .= $errorClass;
    }
@endphp
<label {{ $attributes->merge(['class'=>$class]) }}>
    {{ $slot }}
</label>
