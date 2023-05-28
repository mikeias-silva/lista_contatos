@include('messages.message')
<div>
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name') ?? $contact->name ?? ''}}"/>

    <label for="name">Contact</label>
    <input type="text" name="contact" value="{{old('contact') ?? $contact->contact ?? ''}}"/>

    <label for="name">Email</label>
    <input type="email" name="email" value="{{old('email')?? $contact->email ?? ''}}"/>
</div>

