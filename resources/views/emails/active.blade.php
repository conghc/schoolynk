<p>
	「SchooLynk」{{ trans('label.email_title') }}<br/><br/>

	{{ trans('label.connect_to_site_from_url') }}<br/>
	{{ trans('label.thank_you_to_use_product') }}<br/>
	{{ trans('label.because_we_not_complete') }}<br/>
	</p>
		{{ trans('label.click_url_text') }}<br/>
		<a href="{{ route('student.activate', ['token' => $user->activate_token]) }}"> {{ route('student.activate', ['token' => $user->activate_token]) }}</a>
	<p>
	{{ trans('label.please_note_following') }}<br/>
	{{ trans('label.url_disabled') }}<br/><br/>

	{{ trans('label.automatic_delete') }}<br/><br/>

	{{ trans('label.question_to_contact') }}<br/>
	contact@schoolynk.com <br/><br/>

	{{ trans('label.email_automatic_send') }}<br/>
	{{ trans('label.please_note') }}<br/><br/>

	====================================================================<br/>
	{{ trans('label.edited_and_published') }} contact@schoolynk.com
</p>