@include('messages.message')


<div class="col-4">
    <label for="name" class="form-label">Name:</label>
    <input type="text" name="name" value="{{old('name') ?? $contact->name ?? ''}}" class="form-control"/>
</div>
<div class="col-4">
    <label for="contact" class="form-label">Contact:</label>
    <input type="text" name="contact" value="{{old('contact') ?? $contact->contact ?? ''}}" class="form-control"/>
</div>
<div class="col-4">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" value="{{old('email')?? $contact->email ?? ''}}" class="form-control"/>
</div>

