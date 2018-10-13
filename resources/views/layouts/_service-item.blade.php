<div class="flip-container">
	<div class="flipper">
		<div class="front">
			<div class="service-item">
				<div class="service-icon mb-3">
					@if(is_array($serviceIcon))
						@foreach($serviceIcon as $icon)
							<li class="{{ $icon }}"></li>
						@endforeach
					@else
						<i class="{{ $serviceIcon }} fa-2x"></i>
					@endif
				</div>

				<div class="service-name">
					{{ $serviceName }}
				</div>
			</div>
		</div>

		<div class="back service-description">
			<strong class="service-name"> {{ $serviceName }}</strong>

			<p class="mb-0">
				{{ $serviceDescription }}
			</p>
		</div>
	</div>
</div>