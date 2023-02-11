@php
    $class = 'label';
    $inputName = $attributes->get('for');

    $errorClass = ' invalid';

    $messages = $errors->getMessageBag()->getMessages();

    if(count(Arr::get($messages, $inputName ,[]))) {
        $class .= $errorClass;
    }
@endphp
<label {{ $attributes->merge(['class'=>$class]) }}>
    {{ $slot }}
</label>
