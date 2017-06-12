<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
</div><!-- #main -->
<?php zo_mercury_footer();?>
</div><!-- #page -->
<?php wp_footer(); ?>
<div class="container-fluid" id="footer">
	<div class="container">
		<div>&copy <?= date("Y") ?> Все права защищены</div>
	</div>
</div>

<div id="paranja">
	<div id="window">
		<form name="feedback" action="/sendmail.php" method="post"> 
			<h4>Закажите бесплатную консультацию!</h4>
			<i class="fa fa-times" onclick="jQuery('#window').fadeOut(1000); jQuery('#paranja').fadeOut(1000);"></i>
			<div class="form-group has-feedback">
				<input name="name" type="text" pattern="^[а-яА-ЯёЁ \s]+$" maxlength="25" data-minlength="2" class="form-control" placeholder="Ваше имя *" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<input name="tel" type="text" class="form_tel form-control" pattern='^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$' placeholder="Ваш телефон *" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<input name="email" type="email" maxlength="25" data-minlength="7" class="form-control" placeholder="Ваш e-mail">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group">
				<textarea name="textarea" class="form-control" rows="3" placeholder="Ваше сообщение"></textarea>
			</div>
			<div class="form-group captcha">
				<div class="recaptcha-wrap">
					<div class="g-recaptcha" data-sitekey="6LdW6iMUAAAAAC16Uzau3LykQqrF3ttWrMCMWEZz"></div>
				</div>
				<button type="submit">Отправить</button>
			</div>
		</form>
		<div class="guaranty-window">
			<div>
				<i class="fa fa-times" onclick="jQuery('#window').fadeOut(1000); jQuery('#paranja').fadeOut(1000);"></i>
				<h4>Гарантия 3 года распростроняется на дверные комплекты:</h4>
				Двери производства ф-ки АРБОЛЕДА с системой АРБОТЕК *.
				<h4>Гарантия 2 года распростроняется на дверные комплекты:</h4>
				Двери из массива дуба, ольхи.
				<h4>Гарантия 1 год распростроняется на дверные комплекты:</h4>
				Двери из массива сосны.
				<h4>Гарантия распростроняется в случаях:</h4>
				<ul>
					<li>расстыковки элементов дверного блока;</li>
					<li>дефектов лако-красочного покрытия;</li>
					<li>деформация дверного полотна более чем на 4 мм.</li>
				</ul>
				<h4>Гарантия не распростроняется в случаях:</h4>
				<ol>
					<li>Неправильной установки двери;</li>
					<li>Нарушения условий эксплуатации дверей:</li>
					<ul>
						<li>повышенная, пониженная температура в помещении, резкий перепад температур;</li>
						<li>повышенная, пониженная влажность воздуха в помещении;</li>
						<li>механические повреждения (удары, сколы);</li>
						<li>воздействия химических препоратов;</li>
						<li>прямое попадание солнечных лучей, воздействие тепловых приборов, печей, каминов.</li>
					</ul>
				</ol>
			</div>
		</div>
		<div class="sale-window">
			<div>
				<h4>Скидки и акции</h4>
				<i class="fa fa-times" onclick="jQuery('#window').fadeOut(1000); jQuery('#paranja').fadeOut(1000);"></i>
				<p>Текст окна скидки и акции. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate rerum natus dolores debitis delectus dicta, culpa nemo optio quisquam vero voluptates dignissimos mollitia aut ex quas, nam eligendi. Accusantium, vitae?</p>
			</div>
		</div>
	</div>
</div>

<div id="thanks"><div>Спасибо за Ваше сообщение!<br>Мы свяжемся с Вами в самое ближайшее время!<span class="glyphicon glyphicon-remove" onclick="jQuery('#thanks').fadeOut(1000); window.location='/'"></span></div></div>

<div id="error"><div>Сожелеем, но Вы не прошли каптчу!<br>Пожалуйста, вернитесь к заполнению формы!<span class="glyphicon glyphicon-remove" onclick="jQuery('#error').fadeOut(1000); window.location='/'"></span></div></div>


<script src="/script.js"></script>
</body>
</html>