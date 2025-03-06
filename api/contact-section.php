<?php
// Template Name: Contato: Formulário
?>
<?php
// Obtém o ID da página da CTA pelo título
$contactsection_page = get_page_by_title('Contato: Formulário');
if ($contactsection_page) {
	$contactsection_id = $contactsection_page->ID;

	// Obtém os campos personalizados usando o ID da página da CTA
	$contactsection_title = get_post_meta($contactsection_id, 'contactsection_title', true);
	$contactsection_subtitle = get_post_meta($contactsection_id, 'contactsection_subtitle', true);
	$contactsection_description = get_post_meta($contactsection_id, 'contactsection_description', true);

	$contactsection_link_email = get_post_meta($contactsection_id, 'contactsection_link_email', true);
	$contactsection_link_email_text1 = get_post_meta($contactsection_id, 'contactsection_link_email_text1', true);
	$contactsection_link_email_text2 = get_post_meta($contactsection_id, 'contactsection_link_email_text2', true);

	$contactsection_link_phone = get_post_meta($contactsection_id, 'contactsection_link_phone', true);
	$contactsection_link_phone_text1 = get_post_meta($contactsection_id, 'contactsection_link_phone_text1', true);
	$contactsection_link_phone_text2 = get_post_meta($contactsection_id, 'contactsection_link_phone_text2', true);

	$contactsection_link_address = get_post_meta($contactsection_id, 'contactsection_link_address', true);
	$contactsection_link_address_text1 = get_post_meta($contactsection_id, 'contactsection_link_address_text1', true);
	$contactsection_link_address_text2 = get_post_meta($contactsection_id, 'contactsection_link_address_text2', true);
	$contactforms_subtitle = get_post_meta($contactsection_id, 'contactforms_subtitle', true);
	$contactforms_description = get_post_meta($contactsection_id, 'contactforms_description', true);
}
?>

<section class="contact ">
	<div class="contact__container container display-grid">

		<div class="contact__content content">
			<h2 class="contact__title title">
				<figure class="title-figure display-flex-center">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_contact.svg">
				</figure>
				<?php echo $contactsection_title; ?>
			</h2>
			<h2 class="contact__subtitle subtitle">
				<?php echo $contactsection_subtitle; ?>
			</h2>
			<p class="contact__description description">
				<?php echo $contactsection_description; ?>
			</p>
			<ul class="contact__list list">
				<li class="contact__item">
					<a href="<?php echo $contactsection_link_email; ?>" class="contact__link link display-flex">
						<span class="contact__link--icon">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_contact-mail.svg">
							</figure>
						</span>
						<span class="contact__link--text display-flex">
							<?php echo $contactsection_link_email_text1; ?>
							<strong>
								<?php echo $contactsection_link_email_text2; ?>
							</strong>
						</span>
						</span>
						<span class="contact__link--icon-arrow">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/arrow_forward.svg">
							</figure>
						</span>
					</a>
				</li>
				<li class="contact__item">
					<a href="<?php echo $contactsection_link_phone; ?>" class="contact__link link display-flex">
						<span class="contact__link--icon">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_contact-phone.svg">
							</figure>
						</span>
						<span class="contact__link--text display-flex">
							<?php echo $contactsection_link_phone_text1; ?>
							<strong>
								<?php echo $contactsection_link_phone_text2; ?>
							</strong>
						</span>
						<span class="contact__link--icon-arrow">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/arrow_forward.svg">
							</figure>
						</span>
					</a>
				</li>
				<li class="contact__item">
					<a href="<?php echo $contactsection_link_address; ?>" class="contact__link link display-flex">
						<span class="contact__link--icon">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/wer_contact-address.svg">
							</figure>
						</span>
						<span class="contact__link--text display-flex">
							<?php echo $contactsection_link_address_text1; ?>
							<strong>
								<?php echo $contactsection_link_address_text2; ?>
							</strong>
						</span>
						<span class="contact__link--icon-arrow">
							<figure class="display-flex-center icon-bg">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/arrow_forward.svg">
							</figure>
						</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="contact__content content contact-form__content">
			<h3 class="contact-form__subtitle subtitle"><?php echo $contactforms_subtitle; ?></h3>
			<p class="contact-form__description description"><?php echo $contactforms_description; ?></p>
			<form class="contact-form display-grid" id="contact-form">
				<div>
					<label class="contact-form__label description" for="name">Nome:</label>
					<input class="contact-form__input" id="name" type="text" name="name" placeholder="Nome" required>
				</div>
				<div>
					<label class="contact-form__label description" for="email">E-mail:</label>
					<input class="contact-form__input" id="email" type="email" name="email" placeholder="E-mail" required>
				</div>
				<div class="contact-form__row">
					<label class="contact-form__label description" for="message">Mensagem:</label>
					<textarea class="contact-form__textarea" id="message" name="message" rows="12" placeholder="Mensagem" required></textarea>
				</div>
				<div class="contact-form__row row">
					<button class="contact-form__submit button submit-btn btn" type="submit">Enviar mensagem</button>
				</div>
			</form>
		</div>

	</div>
</section>

<!-- <script>
	document.getElementById('contact-form').addEventListener('submit', function (e) {
		e.preventDefault();

		const form = e.target;
		const submitButton = form.querySelector('button[type="submit"]');
		const originalButtonText = submitButton.textContent;

		const formData = {
			Nome: document.getElementById('name').value,
			"E-mail": document.getElementById('email').value,
			Mensagem: document.getElementById('message').value,
			Telefone: document.getElementById('phone').value
		};

		fetch("https://api.apispreadsheets.com/data/UhmbTZZ3goNiGTYC/", {
			method: "POST",
			body: JSON.stringify({ "data": formData }),
			headers: {
				'Content-Type': 'application/json'
			}
		}).then(res => {
			if (res.status === 201) {
				// SUCCESS
				submitButton.textContent = 'Enviado';
				setTimeout(() => {
					form.reset();  // Limpar o formulário
					submitButton.textContent = originalButtonText;
				}, 2000);  // 2 segundos antes de limpar o formulário
			} else {
				// ERROR
				alert('Houve um erro ao enviar a mensagem.');
			}
		}).catch(error => {
			console.error('Erro:', error);
			alert('Houve um erro ao enviar a mensagem.');
		});
	});
</script> -->