<p>
	「SchooLynk」{{ trans('label.email_title') }} <br/><br/>

	{{ trans('label.reset_password_with_url') }}<br/>
	{{ trans('label.please_perform_re_setting') }}<br/>
	<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a><br/><br/>
	{{ trans('label.please_note_following') }}<br/>

	{{ trans('label.url_disabled') }}<br/><br/>

	{{ trans('label.question_to_contact') }}<br/>
	contact@schoolynk.com <br/><br/>

	{{ trans('label.email_automatic_send') }}<br/>
	{{ trans('label.please_note') }}<br/><br/>

	====================================================================<br/>
	{{ trans('label.edited_and_published') }} contact@schoolynk.com
</p>
