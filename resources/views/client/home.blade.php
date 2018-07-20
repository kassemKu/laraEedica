@extends('client.layouts.app') 

@section('content')
<div class="uk-container uk-padding">
	<div class="uk-background-default ee-border" uk-alert uk-grid>
		<div class="uk-width-2-3">
			حسن أمان حسابك من خلال تمكين المصادقة الثنائية.
		</div>
		<div class="uk-width-1-3">
			<button class="uk-button uk-button-primary uk-button-small uk-border-rounded uk-text-small uk-float-left ee-border-blue">
				تمكين المصادقة الثنائية
			</button>
		</div>
	</div>

	<div class="uk-margin">
		<h4 class="uk-text-muted">السلام عليكم,
			<span class="ee-en">{{ auth()->user()->name }}</span>
		</h4>
	</div>

	<div class="uk-grid-small" uk-grid>
		<div class="uk-width-1-3">
			<div class="uk-flex uk-flex uk-flex-column uk-padding-small uk-text-center uk-background-default ee-border">
				<span>المعاملات المالية</span>
			</div>
		</div>

		<div class="uk-width-2-3">
			2
		</div>
	</div>

</div>
@endsection