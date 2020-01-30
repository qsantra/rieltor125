[SC_FE_SCRIPTS]
[SC_FE_SUCCESS]
[SC_FE_PHP_MAILER]
[SC_FE_INVALID_FORM]

<form id="sc-contact" method="post" [SC_FE_ENCTYPE]>
	<fieldset>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">[SC_FE_NAME] <span class="color-red">*</span></label>
						[SC_FE_ERROR_NAME]
					<input type="text" placeholder="[SC_FE_NAME_PLACEHOLDER]" name="name" id="name" class="form-control" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">[SC_FE_EMAIL] <span class="color-red">*</span></label>
						[SC_FE_ERROR_EMAIL]
					<input type="text" placeholder="[SC_FE_EMAIL_PLACEHOLDER]" name="email" id="email" class="form-control" />
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="subject">[SC_FE_SUBJECT] <span class="color-red">*</span></label>
				[SC_FE_ERROR_SUBJECT]
			<input type="text" placeholder="[SC_FE_SUBJECT_PLACEHOLDER]" name="subject" id="subject" class="form-control" />
		</div>
		
			[SC_FE_WYSIHTML5_EDITOR]
		<div class="form-group margin-bottom-20">
			<label for="message" class="sc-label">[SC_FE_MESSAGE] <span class="color-red">*</span></label>
			[SC_FE_ERROR_MESSAGE]
			<textarea name="message" id="message" class="form-control" rows="8" placeholder="[SC_FE_MESSAGE_PLACEHOLDER]"></textarea>
		</div>
    [SC_FE_ATTACHMENT_FORM]
    [SC_FE_FINAL_CAPTCHA]
    <input type="hidden" id="token" name="token" value="[SC_FE_TOKEN]">
	<div class="form-group margin-top-20">
		<p><button type="submit" class="btn-lg btn-primary">[SC_FE_SUBMIT]</button></p>
    </div>
	</fieldset>
</form>