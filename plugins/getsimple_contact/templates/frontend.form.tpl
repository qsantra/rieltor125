[SC_FE_SCRIPTS]
<div class="sc-success">[SC_FE_SUCCESS]</div>
<div class="sc-error">[SC_FE_PHP_MAILER]</div>
<div class="sc-error">[SC_FE_INVALID_FORM]</div>
<div class="sc-clear"></div>
<form id="sc-contact" method="post" [SC_FE_ENCTYPE]>
    <label for="name" class="sc-label">[SC_FE_NAME]</label>
    <span class="sc-error">[SC_FE_ERROR_NAME]</span>
    <input type="text" placeholder="[SC_FE_NAME_PLACEHOLDER]" name="name" id="name" class="sc-text" />
    <label for="subject" class="sc-label">[SC_FE_SUBJECT]</label>
    <span class="sc-error">[SC_FE_ERROR_SUBJECT]</span>
    <input type="text" placeholder="[SC_FE_SUBJECT_PLACEHOLDER]" name="subject" id="subject" class="sc-text" />
    <label for="email" class="sc-label">[SC_FE_EMAIL]</label>
    <span class="sc-error">[SC_FE_ERROR_EMAIL]</span>
    <input type="text" placeholder="[SC_FE_EMAIL_PLACEHOLDER]" name="email" id="email" class="sc-text" />
    [SC_FE_WYSIHTML5_EDITOR]
    <label for="message" class="sc-label">[SC_FE_MESSAGE]</label>
    <span class="sc-error">[SC_FE_ERROR_MESSAGE]</span>
    <textarea name="message" id="message" class="sc-text-area" placeholder="[SC_FE_MESSAGE_PLACEHOLDER]"></textarea>
    [SC_FE_ATTACHMENT_FORM]
    [SC_FE_FINAL_CAPTCHA]
    <input type="hidden" id="token" name="token" value="[SC_FE_TOKEN]">
    <input type="submit" name="submit" value="[SC_FE_SUBMIT]" class="sc-submit" />
    <div class="sc-clear"></div>
</form>