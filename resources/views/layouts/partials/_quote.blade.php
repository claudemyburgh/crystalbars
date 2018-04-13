<div id="modal-quote" class="modal__overlay {{ $errors->all() ? ' show' : ' hide' }}">
	<div class="modal">
		<div class="modal__header">
			Get a <strong>FREE</strong> Quote
		</div>
		<div class="modal__body">

			<form action="{{ route('send') }}" method="post">

				{{ csrf_field() }}

				<div class="form__group {{ $errors->has('name') ? ' has__danger' : '' }}">
					<label for="name" class="form__label">Name: <span class="text--danger">*</span></label>
					<input type="text" name="name" id="name" class="form__item" value="{{ old('name') }}">
					@if ($errors->has('name'))
					<small class="form__helper">
						<strong>{{ $errors->first('name') }}</strong>
					</small>
					@endif
				</div>

				<div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }}">
					<label for="email" class="form__label">Email: <span class="text--danger">*</span></label>
					<input type="email" name="email" id="email" class="form__item" value="{{ old('email') }}">
					@if ($errors->has('email'))
					<small class="form__helper">
						<strong>{{ $errors->first('email') }}</strong>
					</small>
					@endif
				</div>

				<div class="form__group {{ $errors->has('phone') ? ' has__danger' : '' }}">
					<label for="phone" class="form__label">Phone: <span class="text--danger">*</span></label>
					<input type="text" name="phone" id="phone" class="form__item" value="{{ old('phone') }}">
					@if ($errors->has('phone'))
					<small class="form__helper">
						<strong>{{ $errors->first('phone') }}</strong>
					</small>
					@endif
				</div>

				<div class="form__group {{ $errors->has('message_body') ? ' has__danger' : '' }}">
					<label for="message_body" class="form__label">Message: <span class="text--danger">*</span></label>
					<textarea name="message_body" id="message_body" cols="30" rows="6" class="form__item">{{ old('message') }}</textarea>
					@if ($errors->has('message_body'))
					<small class="form__helper">
						<strong>{{ $errors->first('message_body') }}</strong>
					</small>
					@endif
				</div>

				<div class="form__group">
					<button type="submit" class="btn btn--primary">SEND</button>
				</div>
			</form>

		</div>
		<div class="modal__close text--danger border--danger"></div>
	</div>

</div>