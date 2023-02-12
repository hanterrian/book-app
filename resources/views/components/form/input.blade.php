@php
    if(!$attributes->has('type')) {
        $attributes = $attributes->merge(['type'=>'text']);
    }

    $class = $attributes->get('class','');
    $inputName = $attributes->get('name');

    $errorClass = ' invalid';

    $messages = $errors->getMessageBag()->getMessages();

    if(count(Arr::get($messages, $inputName ,[]))) {
        $class .= $errorClass;
    }
@endphp
<div>
    <input {{ $attributes->merge(['class'=>$class]) }}/>
    @error($inputName)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
