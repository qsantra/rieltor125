<?php

//
// FIELDS
//
$m_smtp_c_Name = 'Имя';

$m_smtp_c_Email = 'Электронная почта';

$m_smtp_c_Message = 'Сообщение';

$m_smtp_c_Captcha = 'Введите цифры с картинки';

$m_smtp_c_agree = 'Я согласен на обработку персональных данных';

$m_smtp_c_Submit = 'Отправить';


//
// MESSAGES
//
$m_smtp_c_NameEmailMessage_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Пожалуйста заполните все поля.</span>';

$m_smtp_c_Email_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Неверный адрес электронной почты.</span>';

$m_smtp_c_Captcha_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Цифры c картинки введены неверно.</span>';

$m_smtp_c_StopSpam_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Это спам.</span>';

$m_smtp_c_agree_error = 'Необходимо дать согласие на обработку персональных данных.';

$m_smtp_c_Success = '<span class="m_smtp_c_success" style="color:green; text-align:left;">Спасибо, Ваше сообщение отправлено.</span>';

// v1.0.6 
$m_smtp_c_Maxlength_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Введено больше символов, чем разрешено.</span>';

$m_smtp_c_Upload_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Ошибка загрузки файла:</span>';

$m_smtp_c_Maxsize_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Размер файла превышает допустимый.</span>';

$m_smtp_c_Format_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Недопустимый формат файла.</span>';

$m_smtp_c_Move_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Не удалось переместить файл:</span>';

$m_smtp_c_Required_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Поле является обязательным.</span>';


//
// DESCRIPTIONS
//
$m_smtp_c_plugin_name = 'Моя SMTP почта'; // Plugin name
$m_smtp_c_small_description = 'Этот плагин поможет вам настроить контактную форму с капчей и чекбоксом. Плагин может использовать SMTP (Simple Mail Transfer Protocol) для отправки почты.'; // Plugin Description
$m_smtp_c_description = "
<h2>Как установить контактную форму?</h2>
<p>Активируйте плагин. Добавьте эту строку кода в шаблон, в котором вы хотите отобразить контактную форму. Например, поместите этот код в боковой колонке шаблона. Или создайте компонент и вставьте в него этот код.</p>
<p><strong>&lt;?php if (function_exists('GetMSC')) { GetMSC(); } ?&gt;</strong></p> 
<p>Стандартная функция отправки PHP включена по умолчанию. Капча используют файлы cookies. Плагин может быть переведен на другие языки. Посмотрите /lang/en.php, ru.php ... Сделайте свой перевод и загрузите файл xx.php в директорию - /lang/ - затем выберите свой языковой файл в настройках плагина. Не используйте атрибуты 'id', 'name' для альтернативных полей.</p>
";


//
// PLUGIN SETTINGS
//
$m_smtp_c_admin_donate = 'Пожертвовать';

$m_smtp_c_admin_plugin_settings = 'Настройки плагина';

$m_smtp_c_admin_language_file = 'Файл языка:';

$m_smtp_c_admin_email_to = 'Электронный адрес для получения почты:';

$m_smtp_c_admin_standard_or_smtp = 'Способ отправки почты:';

$m_smtp_c_admin_standard = 'Стандартная отправка';

$m_smtp_c_admin_smtp = 'Отправка по SMTP';

$m_smtp_c_admin_digital_captcha = 'Капча:';

$m_smtp_c_admin_digitSalt = 'Соль для капчи:';

$m_smtp_c_admin_digitSalt_generate = 'Сгенерировать новую соль';

$m_smtp_c_admin_agree_checkbox = 'Чекбокс:';

$m_smtp_c_admin_email_from = 'Адрес с которого будет отправляться почта:';

$m_smtp_c_admin_email_from_password = 'Пароль:';

$m_smtp_c_admin_email_from_ssl = 'Сервер:';

$m_smtp_c_admin_email_from_port = 'Порт:';

$m_smtp_c_admin_submit = 'Сохранить изменения';

$m_smtp_c_admin_or = 'или';

$m_smtp_c_admin_backward = 'Вернуться назад';

$m_smtp_c_admin_updating_settings = 'Обновление настроек, пожалуйста подождите...';

// v1.0.6 
$m_smtp_c_admin_verification = 'Проверка:';

$m_smtp_c_admin_verification_client_server = 'Клиент и сервер';

$m_smtp_c_admin_verification_server = 'Только сервер';

$m_smtp_c_admin_verification_sender_name = 'Имя отправителя:';

$m_smtp_c_admin_verification_subject = 'Тема:';

$m_smtp_c_admin_alternative_fields = 'Альтернативные поля:';

$m_smtp_c_admin_select_on = 'Вкл.';

$m_smtp_c_admin_select_off = 'Выкл.';

$m_smtp_c_admin_properties = 'Свойства';

$m_smtp_c_admin_qty_fields = 'Количество полей:';

$m_smtp_c_admin_limit_file_size = 'Макс. размер файла (мб):';

$m_smtp_c_admin_valid_file_format = 'Разрешенные форматы (,):';

$m_smtp_c_admin_designation = 'Обозначение';

$m_smtp_c_admin_yes_or_no_designation = 'Выберите, показывать обозначение поля на странице или нет';

$m_smtp_c_admin_yes_or_no_required = 'Выберите, должно ли поле быть обязательным';

$m_smtp_c_admin_field_type = 'Выберите тип поля';

$m_smtp_c_admin_Maxlength = 'Выберите максимальное количество символов в поле';

$m_smtp_c_admin_Code = 'Код';

?>